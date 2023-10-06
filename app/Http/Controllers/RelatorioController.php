<?php

namespace App\Http\Controllers;


use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller

{

    public function showrelatorioMeuCliente($id, $idempresa)
    {


        $user = auth()->user();

        $empresa = cadastro_de_empresa::findOrFail($idempresa);
        $idsClientes = Agendamento::where('cadastro_de_empresas_id', $idempresa)
            ->where('finalizado', 1)
            ->where('cancelado', 0)
            ->distinct()
            ->pluck('user_id')
            ->toArray();



        $encontrado = false;
        foreach ($idsClientes as $cliente) {
            if ($id == $cliente) {
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {

            return redirect('/dashboard');
        }

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {

            $clientesBusca =  User::findOrFail($id);

            $dataprimeiro = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->max('data_hora_finalizacao_agendamento');


            $dataprimeiroagendamento = date('d/m/Y', strtotime($dataprimeiro));

            $dataultimo = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->max('data_hora_finalizacao_agendamento');

            $datadoultimoagendamento = date('d/m/Y', strtotime($dataultimo));

            $agendamentos = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->get();



            $gasto =  $agendamentos->pluck('valorTotalAgendamento')->toArray();

            $totalgasto = array_sum($gasto);
            $totalgasto = number_format($totalgasto, 2, ',', '.');

            $agendamentoscancelados = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('cancelado', 1)
                ->get();

            $agendamentosnaoconfirmados = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 0)
                ->where('confirmado', 0)
                ->where('cancelado', 0)
                ->get();

            $agendamentosconfirmados = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 0)
                ->where('confirmado', 1)
                ->where('cancelado', 0)
                ->get();

            $numeroDeCanelados = count($agendamentoscancelados);
            $numeroDoPedidos = count($agendamentos);
            $numeroDenaoconfirmados = count($agendamentosnaoconfirmados);
            $numeroDeconfirmados = count( $agendamentosconfirmados );


            $totalDepedidos =  $numeroDoPedidos +  $numeroDeCanelados + $numeroDenaoconfirmados +  $numeroDeconfirmados;

            if ($totalDepedidos > 0) {
                $porcentagemDeCancelamento = ($numeroDeCanelados /   $totalDepedidos) * 100;
            } else {
                $porcentagemDeCancelamento = 0;
            }
            $porcentagemDeCancelamento = number_format($porcentagemDeCancelamento, 2);


            $agendamentograficos = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->distinct()
                ->get();



            $formasPagamentos = $agendamentograficos->pluck('formaDepagamentoAgendamento')
                ->flatten()
                ->toArray();
            $contagemfromadepagmaento =  array_count_values($formasPagamentos);
            $formasPagamento = [];
            foreach ($contagemfromadepagmaento as $pagamento => $quantidades) {
                $formasPagamento[] = ['pagamento' => $pagamento, 'quantidades' => $quantidades];
            }



            $produto = $agendamentograficos->pluck('nomeServiçoAgendamento')->flatten()->toArray();

            $contagem = array_count_values($produto);
            $produtos = [];
            foreach ($contagem as $servico => $quantidade) {
                $produtos[] = ['servico' => $servico, 'quantidade' => $quantidade];
            }





            $dados = [
                'nome' => $clientesBusca->name,
                'email' => $clientesBusca->email,
                'contato' => $clientesBusca->phone,
                'clienteDesDe' =>   $dataprimeiroagendamento,
                'ultimoAgendamento' => $datadoultimoagendamento,
                'totalGasto' =>  $totalgasto,
                'PedidosCanelados' =>  $numeroDeCanelados,
                'numeroDoPedidos' =>      $numeroDoPedidos,
                'numeroDenaoconfirmados' => $numeroDenaoconfirmados,
                'porcentagemDeCancelamento' =>  $porcentagemDeCancelamento,
                'totalDepedidos' => $totalDepedidos,
               'numeroDeconfirmados' =>  $numeroDeconfirmados,

            ];

            $pdf = Pdf::loadView('Empresa.relatorios.RelatorioMeucliente', compact('dados', 'formasPagamento', 'produtos'));


            return response($pdf->output())->header('Content-Type', 'application/pdf');
        }
    }

    public function relatorioclientes($id)
    {



        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {

            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->get();


            $numeroMesAtual = Carbon::now()->month;
            $MesAtual = Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->whereMonth('data_hora_finalizacao_agendamento', $numeroMesAtual)->get();


            $finalizado =  $agendamentos->pluck('finalizado')->toArray();
            $contagemFinalizados = array_count_values($finalizado);
            $quantidadeTotalDePedidosfinalizados = $contagemFinalizados[1] ?? 0;

            $finalizadomesatual =  $MesAtual->pluck('finalizado')->toArray();
            $contagemFinalizadosmesatual = array_count_values($finalizadomesatual);
            $quantidadedepedidosmesatual = $contagemFinalizadosmesatual[1] ?? 0;


            $agendamentoscancelados =  Agendamento::where('cadastro_de_empresas_id', $id)->where('cancelado', 1)->get();
            $cancelado = $agendamentoscancelados->pluck('cancelado')->toArray();
            $contagemcancelado = array_count_values($cancelado);
            $quantidadedepedidoscacenlados = $contagemcancelado[1] ?? 0;

            $agendamentosconfirmados =  Agendamento::where('cadastro_de_empresas_id', $id)
            ->where('finalizado', 0)
            ->where('confirmado', 1)
            ->where('cancelado', 0)
            ->get();

            $agendamentosNaoconfirmados =  Agendamento::where('cadastro_de_empresas_id', $id)
            ->where('finalizado', 0)
            ->where('confirmado', 0)
            ->where('cancelado', 0)
            ->get();

            $numeroconfirmados = count( $agendamentosconfirmados);
            $numerodenaoconfirmados = count( $agendamentosNaoconfirmados);





            $totaldepedidos =
            $quantidadeTotalDePedidosfinalizados +  $quantidadedepedidoscacenlados + $numeroconfirmados +  $numerodenaoconfirmados;


            $Porcetagemcancelados = ($quantidadedepedidoscacenlados /   $totaldepedidos) * 100;
            $Porcentagemdepedidoscancelados = number_format($Porcetagemcancelados, 2, '.', '') . '%';


            $userId =  $agendamentos->pluck('user_id')->toArray();

            $clientes = array_count_values($userId);
            $clientetotal = count($clientes);


            $clienteMaisFrequente = array_search(max($clientes), $clientes);

            $clienteComMaisAgendamentos = User::where('id', $clienteMaisFrequente)->first();

            $quantidadeRepeticoes = $clientes[$clienteMaisFrequente];


            $userIdmesatual =  $MesAtual->pluck('user_id')->toArray();
            $clientesMesatual = array_count_values($userIdmesatual);
            $clientemesatual = count($clientesMesatual);




            $dados = [
                'nome' => $empresa->nomeFantasia,
                'quantidadeTotalDePedidosfinalizados'  => $quantidadeTotalDePedidosfinalizados,
                'quantidadedepedidosmesatual' => $quantidadedepedidosmesatual,
                'quantidadedepedidoscacenlados' => $quantidadedepedidoscacenlados,
                'taxaCancelamento' =>  $Porcentagemdepedidoscancelados,
                'Cancelados/confirmados' => $totaldepedidos,
                'totalDeClientes' =>  $clientetotal,
                'clientemesatual' => $clientemesatual,
                'clienteComMaisAgendamentos' =>  $clienteComMaisAgendamentos->name,
                'quantidadeRepeticoes' =>   $quantidadeRepeticoes,
               'numeroconfirmados' => $numeroconfirmados ,
               'numerodenaoconfirmados' => $numerodenaoconfirmados ,
            ];





            $pdf = Pdf::loadView('Empresa.relatorios.relatorioClientes', compact('dados'));

            //


            return response($pdf->output())->header('Content-Type', 'application/pdf');
        }
    }

    public function relatoriofinanceiro($id)
    {



        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {

            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->get();



            $metaAnual =  $empresa->metaDeFaturamento;
            $metaFormatada =  'R$ ' . number_format($metaAnual, 2, ',', '.');
            $metamensal = $metaAnual / 12;
            $metamensalFormatada =   'R$ ' . number_format($metamensal, 2, ',', '.');



            $valorPorMes = [];

            $mesAtual = Carbon::now()->locale('pt_BR')->monthName;

            for ($mes = 1; $mes <= 12; $mes++) {
                $agendamentoFaturamentoanual = Agendamento::where('cadastro_de_empresas_id', $id)
                    ->where('finalizado', 1)
                    ->whereMonth('data_hora_finalizacao_agendamento', $mes)
                    ->get();

                $valorRecebidoMes = $agendamentoFaturamentoanual->sum('valorTotalAgendamento');

                $nomeMes = Carbon::createFromDate(null, $mes, null)->locale('pt_BR')->monthName;
                $valorPorMes[$nomeMes] = $valorRecebidoMes;

                if ($nomeMes === $mesAtual) {
                    $valorMesAtual = $valorRecebidoMes;
                    $metamensal = $metaAnual / 12;
                    $ValorFaltaParaChegarNaMetamensal = $metamensal - $valorMesAtual;
                    if ($metaAnual > 0) {
                        $porcentagem_atingidamensal = ($valorMesAtual / $metamensal) * 100;
                        if ($porcentagem_atingidamensal > 100) {
                            $porcentagem_atingidamensal = 100;
                        }
                    }
                }
            }



            $valorRecebido =  $agendamentos->pluck('valorTotalAgendamento')->toArray();
            $valorRecebidoNumerico = array_map('intval', $valorRecebido);
            $faturamentoAnual = array_sum($valorRecebidoNumerico);



            $formaPagamentoContagemTotal = [];
            $formasPagamento = $agendamentos->pluck('formaDepagamentoAgendamento')->toArray();
            $formaPagamentoContagemTotal[] = array_count_values($formasPagamento);

            $produto = $agendamentos->pluck('nomeServiçoAgendamento')->flatten()->toArray();
            $produtosTotal = array_count_values($produto);


            $dados = [

                'metaAnual' =>  $metaFormatada,
                'metamensal' =>   $metamensalFormatada,
                'faturamentoAnual' =>  $faturamentoAnual,
            ];





            $pdf = Pdf::loadView('Empresa.relatorios.relatoriofinanceiro', compact('dados', 'valorPorMes', 'formaPagamentoContagemTotal', 'produtosTotal'));

            //


            return response($pdf->output())->header('Content-Type', 'application/pdf');
        }
    }

    public function relatorioProdutos($id)
    {


        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {

            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->get();

            $produto = $agendamentos->pluck('nomeServiçoAgendamento')->flatten()->toArray();
            $produtosTotal = array_count_values($produto);



            $pdf = Pdf::loadView('Empresa.relatorios.relatorioprodutos', compact('produtosTotal'));


            return response($pdf->output())->header('Content-Type', 'application/pdf');
        }
    }
}
