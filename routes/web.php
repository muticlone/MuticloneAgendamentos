<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\CadastroEmpresaController;
use App\Http\Controllers\CadastroServicoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrowsershotController;
use App\Http\Controllers\dashboardBusinessController;
use App\Http\Controllers\favoritosController;
use App\Http\Controllers\MeusClientesController;
use App\Http\Middleware\PreventBackHistory;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\RootController;
use Illuminate\Support\Facades\Auth;

// api de busca cnpj
Route::get('/get-cnpj/{cnpj}', function ($cnpj) {
    $url = "https://www.receitaws.com.br/v1/cnpj/{$cnpj}";


    $response = Http::get($url);


    return $response->json();
});





Route::get('/home/empresas', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'company_or_root']);
Route::get('/empresas/dados/{id}', [HomeController::class, 'show']);
Route::get('/', [HomeController::class, 'showServicos'])->name('home.servicos');
Route::get('/servicos/categorias', [HomeController::class, 'categorias'])->name('home.sevico.categorias');
Route::get('/busca/categorias', [HomeController::class, 'Showcategorias'])->name('busca.sevico.categorias');


// Route::get('/get-servicos', [HomeController::class, 'getServicos'])->name('get.servicos');







Route::get('/dashboard/edit/{id}', [CadastroEmpresaController::class, 'edit'])->middleware('auth', 'company_or_root');
Route::put('/empresa/edit/{id}', [CadastroEmpresaController::class, 'update'])->middleware('auth', 'company_or_root');
Route::get('/cadastrar/empresa', [CadastroEmpresaController::class, 'create'])->name('pag.cadastrar.Empresa')->middleware('auth', 'company_or_root');
Route::post('/cadastrar/empresa', [CadastroEmpresaController::class, 'store'])->name('cadastrar.Empresa')->middleware('auth', 'company_or_root');


Route::POST('/cadastrar/agentamentos', [AgendamentoController::class, 'create'])->name('cadastrar.Agentamentos')->middleware('auth');
Route::post('/cadastrar/agentamento', [AgendamentoController::class, 'createNewAgendamento'])->name('cadastrar.agendamento')->middleware('auth');
Route::get('/cadastrar/agendamento/{id}', [AgendamentoController::class, 'storeProdutounico'])->name('cadastrar.agendamentoprodutouncio')->middleware('auth');
Route::post('/cadastrar', [AgendamentoController::class, 'createAgendamentoProdutoUnico'])->name('cadastrar.agendamentoProdutouncio')->middleware('auth');







Route::get('/meus/agendamentos/empresa/{id}/{status}', [AgendamentoController::class, 'showAgendamentosEmpresa'])->name('meus.clientes.agendamentos.empresa')->middleware('auth', 'company_or_root');
Route::get('/meus/clientes/agendamentos/detalhes/{id}/{idEmpresa}', [AgendamentoController::class, 'showAgendamentosEmpresaDetalhes'])->name('meus.clientes.agendamentosdetalhes')->middleware('auth', 'company_or_root');

Route::get('/detalhes/agendamentos/{id}', [AgendamentoController::class, 'show_Agendamentos_Detalhes_Clientes'])->name('show_Agendamentos_Detalhes_Clientes')->middleware('auth');
Route::get('/meus/agendamentos/{status}', [AgendamentoController::class, 'show_Agendamentos_Clientes'])->name('clientes.agendamentos')->middleware('auth');


Route::put('/confirmar{id}', [AgendamentoController::class, 'confirmarPedidoEmpresa'])->middleware('auth');
Route::put('/finalizar{id}', [AgendamentoController::class, 'finalizarPedidoEmpresa'])->middleware('auth');
Route::put('/cancelar{id}', [AgendamentoController::class, 'cancelarPedidoEmpresa'])->middleware('auth');
Route::put('/avaliacao/{id}', [AgendamentoController::class, 'avaliacaoPedidoCliente'])->middleware('auth');
Route::put('/reavaliacao/{id}', [AgendamentoController::class, 'reavaliacaoPedidoCliente'])->middleware('auth');
Route::put('/reagendar/{id}', [AgendamentoController::class, 'ReagendarPedidoEmpresaEcliente'])->middleware('auth');


Route::get('/dados/meus/clientes/{id}/{status}', [MeusClientesController::class, 'showMeusClientes'])->name('dados.meus.clientes')->middleware('auth', 'company_or_root');
Route::get('/dados/meu/cliente/{id}/{idempresa}', [MeusClientesController::class, 'showMeuCliente'])->name('dados.meu.cliente')->middleware('auth', 'company_or_root');
Route::get('/cliente/ranks/{idempresa}', [MeusClientesController::class, 'showMeuClienteranks'])->name('dados.meu.cliente.ranks')->middleware('auth', 'company_or_root');




Route::get('/cadastro/servicos/{id}', [CadastroServicoController::class, 'create'])->name('cadastro.servicos')->middleware('auth', 'company_or_root');
Route::post('/cadastrar/servico/{id}', [CadastroServicoController::class, 'store'])->name('cadastrar.servico')->middleware('auth', 'company_or_root');
Route::get('/servicos/dados/{id}', [CadastroServicoController::class, 'show']);
Route::get('/dados/servicos/{id}', [CadastroServicoController::class, 'showMeusServicos'])->middleware('auth', 'company_or_root');
Route::get('/edit/servicos/{id}', [CadastroServicoController::class, 'edit'])->middleware('auth', 'company_or_root');


Route::put('/edit/servicos/{id}', [CadastroServicoController::class, 'update'])->middleware('auth', 'company_or_root');
Route::delete('/apagar/servicos/{id}',[CadastroServicoController::class,'destroy'])->middleware('auth', 'company_or_root');

// rota de teste da geração img
// Route::get('/generate-image', [OpenAIController::class, 'generateImage']);



// Route::get('/take-screenshot', [BrowsershotController::class, 'takeScreenshot']);


Route::get('root', [RootController::class, 'root'])
    ->name('root')
    ->middleware(['auth', 'root']);



Route::get('/dashboard/business/{id}', [dashboardBusinessController::class, 'dashboardBusiness'])->name('dashboard.business')->middleware('auth', 'company_or_root');
Route::put('/atualizarmeta/{id}', [dashboardBusinessController::class, 'atualizarmeta'])->middleware('auth', 'company_or_root');
Route::get('/agenda/business/{id}', [dashboardBusinessController::class, 'agendaBusiness'])->name('agenda.business')->middleware('auth', 'company_or_root');
Route::get('/produtos/business/{id}/{idServicos}', [dashboardBusinessController::class, 'produtosBusiness'])->name('protudos.business')->middleware('auth', 'company_or_root');




Route::get('/relatorio/meu/cliente/{id}/{idempresa}', [RelatorioController::class, 'showrelatorioMeuCliente'])->name('relatorio.meu.cliente')->middleware('auth', 'company_or_root');



Route::get('/relatorio/clientes/{id}', [RelatorioController::class, 'relatorioclientes'])->name('relatorio.clientes')->middleware('auth', 'company_or_root');
Route::get('/relatorio/financeiro/{id}', [RelatorioController::class, 'relatoriofinanceiro'])->name('relatorio.financeiro')->middleware('auth', 'company_or_root');
Route::get('/relatorio/produtos/{id}', [RelatorioController::class, 'relatorioProdutos'])->name('relatorio.produtos')->middleware('auth', 'company_or_root');

Route::post('/favorito/produtos', [favoritosController::class, 'createfavoritoproduto'])->name('produto.favoritos')->middleware('auth');
Route::delete('/favorito/produtos/drop', [favoritosController::class, 'dropfavoritoproduto'])->name('produto.favoritos.drop')->middleware('auth');
