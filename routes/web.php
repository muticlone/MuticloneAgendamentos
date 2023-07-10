<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\CadastroEmpresaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/empresas/dados/{id}', [HomeController::class, 'show']);



Route::get('/cadastrar/agentamentos', [AgendamentoController::class, 'create'])->name('cadastrar.Agentamentos')->middleware('auth');

Route::get('/cadastrar/empresa', [CadastroEmpresaController::class, 'create'])->name('pag.cadastrar.Empresa')->middleware('auth');

Route::post('/cadastrar/empresa',[CadastroEmpresaController::class, 'store'])->name('cadastrar.Empresa');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
