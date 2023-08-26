<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use Carbon\Carbon;



use App\Models\User;

class HomeController extends Controller
{


    public function index()
    {



        $search = request('search');


        if ($search) {

            $Cadastro_empresa = cadastro_de_empresa::where(function ($query) use ($search) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%')
                    ->orWhere('area_atuacao', 'like', '%' . $search . '%');
            })->paginate(10);
        } else {
            // $Cadastro_empresa = cadastro_de_empresa::all()->reverse();
            $Cadastro_empresa = cadastro_de_empresa::orderBy('id', 'desc')->paginate(20);
        }



        return view('welcome', ['Cadastro_empresa' => $Cadastro_empresa, 'search' => $search]);
    }

    public function showServicos()
    {
        $search = request('search');

        $query = cadastro_de_servico::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomeServico', 'like', '%' . $search . '%')
                    ->orWhere('descricaosevico', 'like', '%' . $search . '%');
            });
        }

        $servico = $query->orderBy('id', 'desc')->paginate(20);

        $paginatedItems = new LengthAwarePaginator(
            $servico->items(),
            $servico->total(),
            $servico->perPage(),
            $servico->currentPage(),
            ['path' => route('home.servicos'), 'query' => ['search' => $search]]
        );

        return view('Empresa.homeservicos', compact('search', 'paginatedItems', 'servico'));
    }




    public function show($id)
    {



        $empresa = cadastro_de_empresa::findOrfail($id);

        $itensPorPagina = 50;


        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $id)
            ->orderBy('id', 'desc')
            ->paginate($itensPorPagina);



        $Admempresa = User::where('id', $empresa->user_id)->first()->toArray();


        $user = auth()->user();



        $agendamentos = Agendamento::where('cadastro_de_empresas_id', $id)
            ->whereNotNull('nota')
            ->whereNotNull('comentario')
            ->whereNotNull('user_id')
            ->get();

        $notas = $agendamentos->pluck('nota');
        $media = $notas->avg();
        $user_id = $agendamentos->pluck('user_id');

        $useragendamento = User::whereIn('id', $user_id)->get();
        $nome =  $useragendamento->pluck('name');







        return view('Empresa.DadosEmpresa', [
            'empresa' => $empresa,
            'Admempresa' =>  $Admempresa, 'servico' => $servico,

            'media' =>  $media, 'agendamentos' => $agendamentos,
            'nome' =>  $nome
        ]);
    }











    public function dashboard()
    {
        /** @var \App\User $user */
        $user = auth()->user();
        $search = request('search');

        if ($search) {
            $empresa = cadastro_de_empresa::where(function ($query) use ($search, $user) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%');
            })
                ->where('user_id', '=', $user->id)
                ->paginate(10);
        } else {
            $empresa = $user->empresas()->paginate(10);
        }

        return view('dashboard', [
            'empresa' => $empresa,

            'search' => $search
        ]);
    }



    public function categorias()
    {


        return view('busca.buscacategorias');
    }

    public function Showcategorias(Request $request)
    {
        $categoria = $request->input('categoria');
        $nomeDaCategoria = $categoria;

        $empresa = cadastro_de_empresa::where('area_atuacao', $nomeDaCategoria)->get();

        $idsempresa = $empresa->pluck('id')->toArray();

        $servicos = cadastro_de_servico::whereIn('cadastro_de_empresas_id', $idsempresa)->paginate(15);

        //anexando manualmente o categoriaparâmetro aos links de paginação
        $servicos->appends(['categoria' => $nomeDaCategoria]);

        return view('ResuladobuscaCategoria', [
            'servicos' => $servicos,
            'empresa' => $empresa,
            'nomeDaCategoria' => $nomeDaCategoria,
        ]);
    }

    public function dashboardBusiness($id)
    {

        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);
        $metaAnual = 50000;
        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)->where('finalizado', 1)->get();

            $finalizado =  $agendamentos->pluck('finalizado')->toArray();
            $contagemFinalizados = array_count_values($finalizado);
            $quantidadedepedidos = $contagemFinalizados[1] ?? 0;

            $idempresa =  $agendamentos->pluck('cadastro_de_empresas_id')->first();
            $empresa = cadastro_de_empresa::findOrfail($idempresa);

            $valorRecebido =  $agendamentos->pluck('valorTotalAgendamento')->toArray();
            $valorRecebidoNumerico = array_map('intval', $valorRecebido);

            $userId =  $agendamentos->pluck('user_id')->toArray();

            $clientes = array_count_values($userId);
            $clientetotal = count($clientes);




            $faturamentoAnual = array_sum($valorRecebidoNumerico);
            $ValorFaltaParaChegarNaMetaAnual = $metaAnual - $faturamentoAnual;
            $porcentagem_atingidaanual = ($faturamentoAnual / $metaAnual) * 100;
            if ($porcentagem_atingidaanual > 100) {
                $porcentagem_atingidaanual = 100;
            }




            $valorPorMes = [];

            $mesAtual = Carbon::now()->format('F');

            for ($mes = 1; $mes <= 12; $mes++) {
                $agendamentoFaturamentoanual = Agendamento::where('cadastro_de_empresas_id', $id)
                    ->where('finalizado', 1)
                    ->whereMonth('updated_at', $mes)
                    ->get();

                $valorRecebidoMes = $agendamentoFaturamentoanual->sum('valorTotalAgendamento');

                $nomeMes = date('F', mktime(0, 0, 0, $mes, 1));
                $valorPorMes[$nomeMes] = $valorRecebidoMes;







                if ($nomeMes === $mesAtual) {
                    $valorMesAtual = $valorRecebidoMes;
                    $metamensal = $metaAnual / 12;
                    $ValorFaltaParaChegarNaMetamensal = $metamensal - $valorMesAtual;

                    $porcentagem_atingidamensal = ($valorMesAtual / $metamensal) * 100;
                    if ($porcentagem_atingidamensal > 100) {
                        $porcentagem_atingidamensal = 100;
                    }
                }
            }





            $formaPagamentoContagemTotal = [];
            $formasPagamento = $agendamentos->pluck('formaDepagamentoAgendamento')->toArray();
            $formaPagamentoContagemTotal = array_count_values($formasPagamento);


            $produto = $agendamentos->pluck('nomeServiçoAgendamento')->flatten()->toArray();
            $produtosTotal = array_count_values($produto);

            $numeroMesAtual = Carbon::now()->month;
            $MesAtual = Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->whereMonth('updated_at', $numeroMesAtual)->get();


            $produtosmaisAgendadosMesatual =  $MesAtual->pluck('nomeServiçoAgendamento')->flatten()->toArray();
            $produtosmensal = array_count_values($produtosmaisAgendadosMesatual);

            $userIdmesatual =  $MesAtual->pluck('user_id')->toArray();
            $clientesMesatual = array_count_values($userIdmesatual);
            $clientemesatual = count($clientesMesatual);

            $finalizadomesatual =  $MesAtual->pluck('finalizado')->toArray();
            $contagemFinalizadosmesatual = array_count_values($finalizadomesatual);
            $quantidadedepedidosmesatual = $contagemFinalizadosmesatual[1] ?? 0;


            $clientePormes = [];

            for ($mes = 1; $mes <= 12; $mes++) {
                $MesAtualgrafico = Agendamento::where('cadastro_de_empresas_id', $id)
                    ->where('finalizado', 1)
                    ->whereMonth('updated_at', $mes)->get();
                    $finalizadografico = $MesAtualgrafico->pluck('finalizado')->toArray(); // Change 'finalizadografico' to 'finalizado'
                    $contagemFinalizadosgrafico = array_count_values($finalizadografico);
                    $quantidadedepedidosgratico = $contagemFinalizadosgrafico[1] ?? 0;


                $nomeMesgrafico = date('F', mktime(0, 0, 0, $mes, 1));
                $clientePormes[$nomeMesgrafico] = $quantidadedepedidosgratico;
            }
        }

        return view('Empresa.dashboardBusiness', [
            'quantidadedepedidos' => $quantidadedepedidos,
            'idempresa' => $idempresa, 'faturamentoAnual' =>  $faturamentoAnual,
            'valorPorMes' =>  $valorPorMes,
            'clientePormes' =>  $clientePormes,
            'formasContagem' =>  $formaPagamentoContagemTotal,
            'valorMesAtual' =>  $valorMesAtual,
            'ValorFaltaParaChegarNaMetaAnual' =>  $ValorFaltaParaChegarNaMetaAnual,
            'metaAnual' =>  $metaAnual,
            'porcentagem_atingidaanual' =>   $porcentagem_atingidaanual,
            'ValorFaltaParaChegarNaMetamensal' =>  $ValorFaltaParaChegarNaMetamensal,
            'metamensal' => $metamensal,
            'porcentagem_atingidamensal' =>  $porcentagem_atingidamensal,
            'empresa' =>  $empresa,
            'produtosTotal' => $produtosTotal,
            'produtosmensal' => $produtosmensal,
            'clientetotal' =>  $clientetotal,
            'clientemesatual' =>  $clientemesatual,
            'quantidadedepedidosmesatual' =>  $quantidadedepedidosmesatual,
        ]);
    }
}
