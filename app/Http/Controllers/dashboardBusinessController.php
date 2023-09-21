<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use Carbon\Carbon;


class dashboardBusinessController extends Controller
{
    public function dashboardBusiness($id)
    {

        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);
        $porcentagem_atingidaanual = 0;
        $porcentagem_atingidamensal = 0;

        $metaAnual =  $empresa->metaDeFaturamento; //sair
        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)->where('finalizado', 1)->get();

            $agendamentoscancelados =  Agendamento::where('cadastro_de_empresas_id', $id)->where('cancelado', 1)->get();
            $cancelado = $agendamentoscancelados->pluck('cancelado')->toArray();
            $contagemcancelado = array_count_values($cancelado);
            $quantidadedepedidoscacenlados = $contagemcancelado[1] ?? 0;



            $finalizado =  $agendamentos->pluck('finalizado')->toArray();
            $contagemFinalizados = array_count_values($finalizado);
            $quantidadedepedidos = $contagemFinalizados[1] ?? 0;


            $Porcetagemcancelados = ($quantidadedepedidoscacenlados / $quantidadedepedidos) * 100;
            $Porcentagemdepedidoscancelados = number_format($Porcetagemcancelados, 2, '.', '') . '%';

            $idempresa =  $agendamentos->pluck('cadastro_de_empresas_id')->first();
            $empresa = cadastro_de_empresa::findOrfail($idempresa);


            $valorRecebido =  $agendamentos->pluck('valorTotalAgendamento')->toArray();
            $valorRecebidoNumerico = array_map('intval', $valorRecebido);

            $userId =  $agendamentos->pluck('user_id')->toArray();

            $clientes = array_count_values($userId);
            $clientetotal = count($clientes);




            $faturamentoAnual = array_sum($valorRecebidoNumerico);
            $ValorFaltaParaChegarNaMetaAnual = $metaAnual - $faturamentoAnual;
            if ($metaAnual > 0) {
                $porcentagem_atingidaanual = ($faturamentoAnual / $metaAnual) * 100;
                if ($porcentagem_atingidaanual > 100) {
                    $porcentagem_atingidaanual = 100;
                }
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
                    if ($metaAnual > 0) {
                        $porcentagem_atingidamensal = ($valorMesAtual / $metamensal) * 100;
                        if ($porcentagem_atingidamensal > 100) {
                            $porcentagem_atingidamensal = 100;
                        }
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

            $agendamentos = Agendamento::where('cadastro_de_empresas_id', $id)
                ->whereNotNull('nota')
                ->whereNotNull('comentario')
                ->whereNotNull('user_id')
                ->get();

            $notas = $agendamentos->pluck('nota');
            $media = $notas->avg();
        }

        return view('Empresa.dashboard.dashboardBusiness', [
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
            'media' =>  $media,
            'Porcentagemdepedidoscancelados' => $Porcentagemdepedidoscancelados,
            'quantidadedepedidoscacenlados' => $quantidadedepedidoscacenlados,
        ]);
    }

    public function atualizarmeta($id,  Request $request)
    {

        $valorDaMetaAnual = $request->input('valorDaMetaAnual');
        $valorDaMetaAnualFloat = (float) str_replace(["R$", ".", ","], ["", "", "."],  $valorDaMetaAnual);

        $empresa = cadastro_de_empresa::findOrFail($id);
        $empresa->metaDeFaturamento =  $valorDaMetaAnualFloat;
        $empresa->save();

        return back()->with('msg', 'salvo!');
    }


}