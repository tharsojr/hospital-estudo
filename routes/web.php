<?php

use Illuminate\Support\Facades\Route;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\InternacaoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pacientes', [PacienteController::class, 'index'])
    ->name('pacientes.index');

Route::get('/pacientes/novo', [PacienteController::class, 'create'])
    ->name('pacientes.create');

Route::post('/pacientes', [PacienteController::class, 'store'])
    ->name('pacientes.store');

Route::get('/pacientes/{paciente}/editar', [PacienteController::class, 'edit'])
    ->name('pacientes.edit');

Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])
    ->name('pacientes.update');

Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])
    ->name('pacientes.destroy');

Route::get('/pacientes/{paciente}', [PacienteController::class, 'show'])
    ->name('pacientes.show');

Route::get('/internacoes/{paciente}/novo', [InternacaoController::class, 'create'])
    ->name('internacoes.create');

Route::post('/internacoes', [InternacaoController::class, 'store'])
    ->name('internacoes.store');

Route::get('/internacoes', [InternacaoController::class, 'index'])
    ->name('internacoes.index');

Route::get('/internacoes/{internacao}/editar', [InternacaoController::class, 'edit'])   
    ->name('internacoes.edit');

Route::put('/internacoes/{internacao}', [InternacaoController::class, 'update'])
    ->name('internacoes.update');

Route::delete('/internacoes/{internacao}', [InternacaoController::class, 'destroy'])
    ->name('internacoes.destroy');      

Route::get('/internacoes/{internacao}/alta', [InternacaoController::class, 'altaForm'])
    ->name('internacoes.alta.form');

Route::patch('/internacoes/{internacao}/alta', [InternacaoController::class, 'alta'])
    ->name('internacoes.alta'); 