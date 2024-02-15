<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\IrController;
use App\Http\Controllers\IsController;
use App\Http\Controllers\CustomController;

use App\Http\Middleware\CustomAuthMiddleware;


//PAGINA INICIAL
Route::get('/', [TerapeutaController::class, 'index']);

Route::middleware([CustomAuthMiddleware::class])->group(function () {
    Route::post('/registerauthmiddleware', [CustomController::class, 'authenticate']);
    // ... outras rotas aqui
});

Route::get('/authmiddle',[CustomController::class, 'showRegisterForm']);


//PAGINA FORMULARIO IR
Route::get('/ir',[SessaoController::class, 'irshow'])->name('ir.show');

//PAGINA FORMULARIO IS
Route::get('/is',[SessaoController::class, 'isshow'])->name('is.show');

//POST FORMULARIO IR
Route::post('/salvar-dados-ir',[IrController::class, 'store'])->name('salvar-dados-ir');

//POST FORMULARIO IS
Route::post('/salvar-dados-is',[IsController::class, 'store'])->name('salvar-dados-is');



//DASHBOARD
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[SessaoController::class, 'dashboard'])->name('dashboard');
});

//PAGINA COM OS LINKS GERADOS AO CRIAR A SESSAO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/links',function() {
        return view('links');
    })->name('links');
});


// CRIAR SESSÕES

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/s/sregister', [SessaoController::class, 'create'], [PacienteController::class, 'index'])->name('forms.registersession');
});

//POST DAS SESSOES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/dashboard/s',[SessaoController::class, 'store']);
});




//LISTAGEM DOS PACIENTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/pacientes', [SessaoController::class, 'index'])->name('pacientes');
});














// CRIAR PACIENTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/p/pregister', [PacienteController::class, 'create'])->name('forms.registerpacient');
});

//POST DOS PACIENTES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/dashboard/p',[PacienteController::class, 'store']);
});

//RESULTADOS DOS FORMS DO PACIENTE X
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/pacientes/{pacient_id}/resultados', [SessaoController::class, 'showResults'])->name('pacientes.resultados');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/pacientes/{pacient_id}/resultadosII', [SessaoController::class, 'showResultsII'])->name('pacientes.resultadosII');
});

//LISTA DE SESSOES FEITAS POR TERAPEUTA X
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/s/sdelete', [SessaoController::class, 'listSessions'])->name('list-sessions');
});
//DELETE DAS SESSOES DO TERAPEUTA X
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::delete('/sessoes/{session_id}', [SessaoController::class, 'deleteSessions'])->name('delete-session');
});

//LISTA DE SESSOES FEITAS POR TERAPEUTA X
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/p/pdelete', [SessaoController::class, 'listPacients'])->name('list-pacients');
});
//DELETE DAS SESSOES DO TERAPEUTA X
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::delete('/pacients/{pacient_id}', [SessaoController::class, 'deletePacients'])->name('delete-pacient');
});










