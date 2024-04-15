<?php



namespace App\Http\Controllers;


use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Session;

use App\services\PacienteService;

use App\Models\Pacient;
use App\Models\Therapist;

use App\Models\Ir;
use App\Models\Is;

class SessaoController extends Controller
{
    protected $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }
    public function dashboard() {
        $therapist_id = Auth::user()->therapist_id;

        $pacients = Pacient::where('therapist_id', $therapist_id)->orderBy('nome')->get();

        $sessions = Session::where('therapist_id', $therapist_id)->get();


        foreach ($pacients as $pacient) {
            $numSessoes = $sessions->where('pacient_id', $pacient->id)->count();
            $ultimaSessao = $sessions->where('pacient_id', $pacient->id)->max('data');

            $pacient->num_sessoes = $numSessoes;
            $pacient->ultima_sessao = $ultimaSessao;
        }

        return view('dashboard2', ['therapist_id' => $therapist_id, 'pacients' => $pacients]);

    }

    public function index() {
        $therapistId = Auth::user()->therapist_id;

        $sessions = Session::where('therapist_id', $therapistId)->get();

        $pacientIds = $sessions->pluck('pacient_id')->unique();

        $pacients = Pacient::whereIn('id', $pacientIds)->orderBy('nome')->get();

        foreach ($pacients as $pacient) {
            $numSessoes = $sessions->where('pacient_id', $pacient->id)->count();
            $ultimaSessao = $sessions->where('pacient_id', $pacient->id)->max('data');

            $pacient->num_sessoes = $numSessoes;
            $pacient->ultima_sessao = $ultimaSessao;
        }


        return view('pacientes', ['therapist_id' => $therapistId, 'pacients' => $pacients]);


    }


    public function create($pacient_id)
{
    $therapistId = Auth::user()->therapist_id;

    $pacientes = Pacient::where('id', $pacient_id)->first();
    if(!$pacientes) {
        return abort(404);
    }

    return view('forms.registersession', ['xtid' => $pacientes->id , 'nome' => $pacientes->nome]);
}
    private function generateSecureToken($session_id) {
        $secret_key = "Whatisneededtochangeapersonistochangetheirawarenessofthemselves";
        return hash_hmac('sha256',$session_id,$secret_key);
    }
    public function store(Request $request){
        $session = new Session;

        $session->pacient_id = $request->paciente_id;
        $d = Carbon::createFromFormat('Y-m-d\TH:i',$request->date)->toDateTimeString();
        $session->data = $d;
        $session->therapist_id = Auth::user()->therapist_id;

        $session->save();

        $paciente = Pacient::find($request->paciente_id);
        if ($paciente) {
            $ir = Ir::create([
                'session_id' => (int)$session->id,
                'individualmente' => 0,
                'outrasPessoas' => 0,
                'socialmente' => 0,
                'resultadoGlobal' => 0,
            ]);

            $is = Is::create([
                'session_id' => (int)$session->id,
                'relacaoTerapeuta' => 0,
                'metasTemas' => 0,
                'metodoForma' => 0,
                'sessaoGlobal' => 0,
        
            ]);


            $token = $this->generateSecureToken($session->id);
            return view('links', ['is' => $is, 'ir' => $ir, 'token' => $token]);
        } else {
            abort(404);
        }
    }

    public function irshow(Request $request) {
        $session_id = $request->query('session_id');
        $token = $request->query('token');

        if(!$this->validateToken($session_id,$token)) {
            abort(403,'Não autorizado');
        }else{
            $ir = Ir::where('session_id',$session_id)->first();


            $session = Session::find($session_id);

            $pacient = Pacient::find($session->pacient_id)->nome;

            $therapist = Therapist::find($session->therapist_id)->usuario;

            $data = $session->data;


            return view('forms.formir', ['pacient' => $pacient, 'therapist' => $therapist, 'data' => $data, 'ir' => $ir]);


        }

        
    }
    public function isshow(Request $request) {
        $session_id = $request->query('session_id');
        $token = $request->query('token');

        if(!$this->validateToken($session_id,$token)) {
            abort(403,'Não autorizado');
        }else{
            $is = Is::where('session_id',$session_id)->first();


            $session = Session::find($session_id);

            $pacient = Pacient::find($session->pacient_id)->nome;

            $therapist = Therapist::find($session->therapist_id)->usuario;

            $data = $session->data;


            return view('forms.formis', ['pacient' => $pacient, 'therapist' => $therapist, 'data' => $data, 'is' => $is]);


        }
        
    }

    private function validateToken($session_id,$token){
        $generatedToken = $this->generateSecureToken($session_id);
        return hash_equals($generatedToken,$token);
    }

    public function showResults($pacient_id){

        $therapist_id = Auth::user()->therapist_id;
        $sessoes = Session::where('pacient_id', $pacient_id)
            ->where('therapist_id', $therapist_id)
            ->get();
    
        $relatorios = [];
        foreach ($sessoes as $sessao) {
            $ir = Ir::where('session_id', $sessao->id)->first();
    
            $dataCarbon = Carbon::parse($sessao->data);
            $dataFormatada = $dataCarbon->format('d/m/Y');
            $dataOrdenada = $dataCarbon->format('Y-d-m'); // Alterando o formato da data para 'yyyy-dd-mm'
            $ano = $dataCarbon->year; 
    
            $relatorios[] = [
                'sessao_id' => $sessao->id,
                'data' => $dataOrdenada,
                'dataFormatada' => $dataFormatada,
                'ano' => $ano,
                'paciente' => $sessao->pacient->nome,
                'terapeuta' => $sessao->therapist->usuario,
                'ir' => $ir,
            ];
        }
    
        // Ordenando os relatórios por data completa
        usort($relatorios, function($a, $b) {
            return strtotime($a['data']) - strtotime($b['data']);
        });
    
        return view('graf-acom-ir', compact('relatorios'));
    }

    public function showResultsII($pacient_id){

        
        $therapist_id = Auth::user()->therapist_id;
        $sessoes = Session::where('pacient_id', $pacient_id)
            ->where('therapist_id', $therapist_id)
            ->get();
    
        $relatorios = [];
        foreach ($sessoes as $sessao) {
            $is = Is::where('session_id', $sessao->id)->first();
    
            $dataCarbon = Carbon::parse($sessao->data);
            $dataFormatada = $dataCarbon->format('d/m/Y');
            $dataOrdenada = $dataCarbon->format('Y-d-m'); // Alterando o formato da data para 'yyyy-dd-mm'
            $ano = $dataCarbon->year; 
    
            $relatorios[] = [
                'sessao_id' => $sessao->id,
                'data' => $dataOrdenada,
                'dataFormatada' => $dataFormatada,
                'ano' => $ano,
                'paciente' => $sessao->pacient->nome,
                'terapeuta' => $sessao->therapist->usuario,
                'is' => $is,
            ];
        }
    
        // Ordenando os relatórios por data completa
        usort($relatorios, function($a, $b) {
            return strtotime($a['data']) - strtotime($b['data']);
        });
    
        return view('graf-acom-is', compact('relatorios'));
    }

    public function listSessions($pacient_id){
        $therapist_id = Auth::user()->therapist_id;
        $pacient = Pacient::where('id', $pacient_id)->first();
        $sessions = Session::where('therapist_id', $therapist_id)->where('pacient_id', $pacient_id)->get();

        if($sessions->count() == 0 ){
            return redirect('/dashboard')->with('alert', "Não há sessões cadastradas para essse paciente");
        }
        foreach ($sessions as $session) {
            $token = $this->generateSecureToken($session->id);
            $tokens[$session->id] = $token;
        }
        return view('list-sessions', ['sessions' => $sessions, 'pacient' => $pacient, 'tokens' => $tokens]);
    }

    public function deleteSessions($session_id){
        $session = Session::find($session_id);

        if ($session) {
            $session->delete();
            return redirect()->back()->with('success', 'Sessão excluída com sucesso.');
        }
    
        return redirect()->back()->with('error', 'Erro ao excluir a sessão.');
    
    }
    public function listPacients(){
        $therapist_id = Auth::user()->therapist_id;
        $pacients = Pacient::where('therapist_id', $therapist_id)->get();
        return view('list-pacients', ['pacients' => $pacients]);
    }

    public function deletePacients($pacient_id){
        $pacient = Pacient::find($pacient_id);

        if ($pacient) {
            $pacient->delete();
            return redirect()->back()->with('success', 'Paciente excluído com sucesso.');
        }
    
        return redirect()->back()->with('error', 'Erro ao excluir o Paciente.');
    

    }

    
}
