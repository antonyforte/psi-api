<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Pacient;
use App\Models\Sessao;
use App\Models\Therapist;
use App\Models\User;

use App\services\PacienteService;

class PacienteController extends Controller
{

    protected $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function index(){

        $pacientes = $this->pacienteService->getAllPacientes();
        return view('paciente.index', compact('pacientes'));
    }

    public function index2() {
        $therapistId = Auth::user()->therapist_id;

        $pacientes = Sessao::where('therapist_id', $therapistId)
            ->join('pacients', 'sessoes.pacient_id', '=', 'pacients.id')
            ->pluck('pacients.nome');

        return view('pacientes', ['pacients' => $pacients]);
    }

    public function create() {
        return view('forms.registerpacient');
    }

    public function store(Request $request){

        $pacient = new Pacient;

        $pacient->nome = $request->nome;

        $token = Hash::make($request->nome);
        $pacient->token = substr($token, 7, 20);

        $therapistId = Auth::user()->therapist_id;

        $pacient->therapist_id = $therapistId;



        $pacient->save();

        return redirect('/dashboard');

    }
}
