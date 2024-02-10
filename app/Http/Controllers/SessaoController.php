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

        return view('dashboard', compact('therapist_id'));

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


    public function create()
{
    $therapistId = Auth::user()->therapist_id;

    $pacientes = Pacient::where('therapist_id', $therapistId)->get();

    return view('forms.registersession', compact('pacientes'));
}

    public function store(Request $request){
        $session = new Session;

        $session->pacient_id = $request->paciente_id;
        $d = Carbon::createFromFormat('Y-m-d\TH:i',$request->date)->toDateTimeString();
        $session->data = $d;
        $session->therapist_id = Auth::user()->therapist_id;

        $session->save();

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
            'metodoForma' => 2,
            'sessaoGlobal' => 0,
    
        ]);


        
        return view('links', ['is' => $is, 'ir' => $ir]);
    }

    public function irshow(Request $request) {
        $session_id = $request->query('session_id');

        $ir = Ir::where('session_id',$session_id)->first();


        $session = Session::find($session_id);

        $pacient = Pacient::find($session->pacient_id)->nome;

        $therapist = Therapist::find($session->therapist_id)->usuario;

        $data = $session->data;


        return view('forms.formir', ['pacient' => $pacient, 'therapist' => $therapist, 'data' => $data, 'ir' => $ir]);

    }
    public function isshow(Request $request) {
        $session_id = $request->query('session_id');

        $is = Is::where('session_id',$session_id)->first();


        $session = Session::find($session_id);

        $pacient = Pacient::find($session->pacient_id)->nome;

        $therapist = Therapist::find($session->therapist_id)->usuario;

        $data = $session->data;


        return view('forms.formis', ['pacient' => $pacient, 'therapist' => $therapist, 'data' => $data, 'is' => $is]);

    }

    public function showResults($pacient_id){

        $therapist_id = Auth::user()->therapist_id;
        $sessoes = Session::where('pacient_id', $pacient_id)
            ->where('therapist_id', $therapist_id)
            ->get();

        $relatorios = [];
        foreach ($sessoes as $sessao) {
            $ir = Ir::where('session_id', $sessao->id)->first();

            $relatorios[] = [
                'sessao_id' => $sessao->id,
                'data' => $sessao->data,
                'paciente' => $sessao->pacient->nome,
                'terapeuta' => $sessao->therapist->nome,
                'ir' => $ir,
            ];
        }

        return view('results', compact('relatorios'));
    }

    public function showResultsII($pacient_id){

        $therapist_id = Auth::user()->therapist_id;
        $sessoes = Session::where('pacient_id', $pacient_id)
            ->where('therapist_id', $therapist_id)
            ->get();

        $relatorios = [];
        foreach ($sessoes as $sessao) {
            $is = Is::where('session_id', $sessao->id)->first();

            $relatorios[] = [
                'sessao_id' => $sessao->id,
                'data' => $sessao->data,
                'paciente' => $sessao->pacient->nome,
                'terapeuta' => $sessao->therapist->nome,
                'is' => $is,
            ];
        }

        return view('resultsII', compact('relatorios'));
    }

    public function listSessions($therapist_id){
        $sessions = Session::where('therapist_id', $therapist_id)->with('patient')->orderBy('date', 'desc')->get();
        return view('list-sessions', ['sessions' => $sessions]);
    }

    public function deleteSessions(){
        $session = Session::find($session_id);

        if ($session) {
            $session->delete();
            return redirect()->back()->with('success', 'Sessão excluída com sucesso.');
        }
    
        return redirect()->back()->with('error', 'Erro ao excluir a sessão.');
    

    }

    
}
