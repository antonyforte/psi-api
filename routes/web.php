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

use App\Http\Controllers\ChartController;

use App\Http\Controllers\TerapeutaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\IrController;
use App\Http\Controllers\IsController;
use App\Actions\Fortify\CreateNewUser; 




//PAGINA INICIAL
Route::get('/', [TerapeutaController::class, 'index']);


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
    Route::get('/dashboard/sessoes/{pacient_id?}', [SessaoController::class, 'listSessions'])->name('sessions');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/sessoes/{pacient_id?}/register', [SessaoController::class, 'create'])->name('forms.registersession');
});

//POST DAS SESSOES
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/dashboard/sessoes/register',[SessaoController::class, 'store']);
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/register', function () {
    return view('auth.register');
})->name('register');

// Rota padrão do Jetstream para o processamento do formulário de registro
Route::post('/register', [Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'store']);
