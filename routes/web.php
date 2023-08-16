<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\CadastroEmpresaController;
use App\Http\Controllers\CadastroServicoController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OpenAIController;


// api de busca cnpj
Route::get('/get-cnpj/{cnpj}', function ($cnpj) {
    $url = "https://www.receitaws.com.br/v1/cnpj/{$cnpj}";


    $response = Http::get($url);


    return $response->json();
});





Route::get('/home/empresas', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/empresas/dados/{id}', [HomeController::class, 'show']);
Route::get('/', [HomeController::class, 'showServicos'])->name('home.servicos');
Route::get('/servicos/categorias', [HomeController::class, 'categorias'])->name('home.sevico.categorias');
Route::get('/busca/categorias', [HomeController::class, 'Showcategorias'])->name('busca.sevico.categorias');
Route::get('/dashboard/business', [HomeController::class, 'dashboardBusiness'])->name('dashboard.business');

Route::get('/dashboard/edit/{id}', [CadastroEmpresaController::class, 'edit'])->middleware('auth');
Route::put('/empresa/edit/{id}', [CadastroEmpresaController::class, 'update'])->middleware('auth');
Route::get('/cadastrar/empresa', [CadastroEmpresaController::class, 'create'])->name('pag.cadastrar.Empresa')->middleware('auth');
Route::post('/cadastrar/empresa', [CadastroEmpresaController::class, 'store'])->name('cadastrar.Empresa')->middleware('auth');


Route::POST('/cadastrar/agentamentos', [AgendamentoController::class, 'create'])->name('cadastrar.Agentamentos')->middleware('auth');
Route::post('/cadastrar/agentamento', [AgendamentoController::class, 'store'])->name('cadastrar.agendamento')->middleware('auth');
Route::get('/cadastrar/agendamento/{id}', [AgendamentoController::class, 'storeProdutounico'])->name('cadastrar.agendamentoprodutouncio')->middleware('auth');
Route::post('/cadastrar', [AgendamentoController::class, 'createProdutounico'])->name('cadastrar.agendamentoProdutouncio')->middleware('auth');
Route::get('/meus/agendamentos', [AgendamentoController::class, 'show'])->name('meus.agendamentos')->middleware('auth');
Route::get('/detalhes/agendamentos/{id}', [AgendamentoController::class, 'showdetalhes'])->name('meus.agendamentosdetalhes')->middleware('auth');
Route::get('/meus/clientes/agendamentos/empresa/{id}', [AgendamentoController::class, 'showdetalhesagendametnosempresa'])->name('meus.clientes.agendamentosdetalhesempresa')->middleware('auth');

Route::get('/cadastro/servicos/{id}', [CadastroServicoController::class, 'create'])->name('cadastro.servicos')->middleware('auth');
Route::post('/cadastrar/servico/{id}', [CadastroServicoController::class, 'store'])->name('cadastrar.servico')->middleware('auth');
Route::get('/servicos/dados/{id}', [CadastroServicoController::class, 'show']);
Route::get('/dados/servicos/{id}', [CadastroServicoController::class, 'showMeusServicos'])->middleware('auth');
Route::get('/edit/servicos/{id}', [CadastroServicoController::class, 'edit'])->middleware('auth');
Route::put('/edit/servicos/{id}', [CadastroServicoController::class, 'update'])->middleware('auth');
Route::delete('/apagar/servicos/{id}',[CadastroServicoController::class,'destroy'])->middleware('auth');

// rota de teste da geração img
// Route::get('/generate-image', [OpenAIController::class, 'generateImage']);









