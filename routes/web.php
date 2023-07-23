<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\CadastroEmpresaController;
use App\Http\Controllers\CadastroServicoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyController;

Route::get('/home/empresas', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/empresas/dados/{id}', [HomeController::class, 'show']);
Route::get('/', [HomeController::class, 'showServicos'])->name('home.servicos');

Route::get('/dashboard/edit/{id}', [CadastroEmpresaController::class, 'edit'])->middleware('auth');
Route::put('/empresa/edit/{id}', [CadastroEmpresaController::class, 'update'])->middleware('auth');
Route::get('/cadastrar/empresa', [CadastroEmpresaController::class, 'create'])->name('pag.cadastrar.Empresa')->middleware('auth');
Route::post('/cadastrar/empresa', [CadastroEmpresaController::class, 'store'])->name('cadastrar.Empresa')->middleware('auth');


Route::POST('/cadastrar/agentamentos', [AgendamentoController::class, 'create'])->name('cadastrar.Agentamentos')->middleware('auth');
Route::post('/cadastrar/agentamento', [AgendamentoController::class, 'store'])->name('cadastrar.agendamento')->middleware('auth');

Route::get('/cadastro/servicos/{id}', [CadastroServicoController::class, 'create'])->name('cadastro.servicos')->middleware('auth');
Route::post('/cadastrar/servico/{id}', [CadastroServicoController::class, 'store'])->name('cadastrar.servico')->middleware('auth');
Route::get('/dados/servicos/{id}', [CadastroServicoController::class, 'show']);
Route::get('/dados/servicos/{id}', [CadastroServicoController::class, 'showMeusServicos'])->middleware('auth');
Route::get('/edit/servicos/{id}', [CadastroServicoController::class, 'edit'])->middleware('auth');
