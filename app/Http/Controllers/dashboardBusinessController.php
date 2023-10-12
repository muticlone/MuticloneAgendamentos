<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\avaliacao_produto;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class dashboardBusinessController extends Controller
{



    public function dashboardBusiness($id)
    {

        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);
        $porcentagem_atingidaanual = 0;
        $porcentagem_atingidamensal = 0;

        $metaAnual =  $empresa->metaDeFaturamento;
        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->get();

            $agendamentoscancelados =  Agendamento::where('cadastro_de_empresas_id', $id)->where('cancelado', 1)->get();
            $cancelado = $agendamentoscancelados->pluck('cancelado')->toArray();
            $contagemcancelado = array_count_values($cancelado);
            $quantidadedepedidoscacenlados = $contagemcancelado[1] ?? 0;



            $finalizado =  $agendamentos->pluck('finalizado')->toArray();
            $contagemFinalizados = array_count_values($finalizado);
            $quantidadedepedidos = $contagemFinalizados[1] ?? 0;

            $agendamentosnaoconfirmados =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 0)
                ->where('confirmado', 0)
                ->where('cancelado', 0)
                ->get();

            $agendamentosconfirmados =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 0)
                ->where('confirmado', 1)
                ->where('cancelado', 0)
                ->get();


            $numeroconfirmados = count($agendamentosconfirmados);


            $numeroDenaoconfirmados = count($agendamentosnaoconfirmados);




            $todosOspedidos =
                $quantidadedepedidos +  $quantidadedepedidoscacenlados +  $numeroDenaoconfirmados +  $numeroconfirmados;


            $Porcetagemcancelados = ($quantidadedepedidoscacenlados /   $todosOspedidos) * 100;
            $Porcentagemdepedidoscancelados = number_format($Porcetagemcancelados, 2, '.', '') . '%';

            $idempresa =  $agendamentos->pluck('cadastro_de_empresas_id')->first();
            $empresa = cadastro_de_empresa::findOrfail($idempresa);


            $valorRecebido =  $agendamentos->pluck('valorTotalAgendamento')->toArray();
            $valorRecebidoNumerico = array_map('intval', $valorRecebido);

            $userId =  $agendamentos->pluck('user_id')->toArray();

            $clientes = array_count_values($userId);
            $clientetotal = count($clientes);


            $clienteMaisFrequente = array_search(max($clientes), $clientes);

            $clienteComMaisAgendamentos = User::where('id', $clienteMaisFrequente)->first();

            $quantidadeRepeticoes = $clientes[$clienteMaisFrequente];

            $nomeClienteMaisFrequente =  $clienteComMaisAgendamentos->name;

            $partesDoNome = explode(" ",  $nomeClienteMaisFrequente);

            // Pega o primeiro elemento do array resultante
            $nomeClienteMaisFrequente = $partesDoNome[0];





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
                    ->whereMonth('data_hora_finalizacao_agendamento', $mes)
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
                ->whereMonth('data_hora_finalizacao_agendamento', $numeroMesAtual)->get();


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
                    ->whereMonth('data_hora_finalizacao_agendamento', $mes)->get();
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
            'formaPagamentoContagemTotal' =>  $formaPagamentoContagemTotal,
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
            'quantidadeRepeticoes' =>  $quantidadeRepeticoes,
            'nomeClienteMaisFrequente' => $nomeClienteMaisFrequente,
            'idcliente' =>  $clienteMaisFrequente,
            'todosOspedidos' => $todosOspedidos,
            'numeroDenaoconfirmados' =>  $numeroDenaoconfirmados,
            'agendamentosconfirmados' => $numeroconfirmados
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

    public function agendaBusiness($id)
    {


        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);
        $idempresa = $empresa->id;


        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $agendamentos =  Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('confirmado', 1)
                ->where('finalizado', 0)
                ->where('cancelado', 0)
                ->get();
            $users = User::all();
            $ids = [];
            foreach ($users as $user) {
                $ids[] = $user->id;
            }

            $eventos = [];
            foreach ($agendamentos as $evento) {
                $title = '';
                if (in_array($evento->user_id, $ids)) {
                    $user = $users->where('id', $evento->user_id)->first();
                    $title = $user->name;
                }

                $eventos[] = [
                    'title' => $title,
                    'start' => $evento->dataHorarioAgendamento,

                ];
            }
        }








        return view('Empresa.dashboard.agendaBusiness', [
            'eventos' => $eventos,
            'idempresa' =>  $idempresa,

        ]);
    }

    public function produtosBusiness($id, $idServicos)
    {


        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);


        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {


            $servicos = cadastro_de_servico::where('id', $idServicos)
                ->first();

            $idServicos = intval($idServicos);



            $agendamentos = Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->whereRaw("JSON_CONTAINS(idServicos, CAST(? AS JSON))", [$idServicos])
                ->get();

            $numeroDeAgendamentos = $agendamentos->pluck('idServicos')->flatten()->toArray();
            $countedValues = array_count_values($numeroDeAgendamentos);
            $repeatedValues = [];
            foreach ($countedValues as $value => $count) {
                if ($count > 1 || count($numeroDeAgendamentos) == 1) {
                    // Adicione o valor repetido $count vezes
                    for ($i = 0; $i < $count; $i++) {
                        $repeatedValues[] = $value;
                    }
                }
            }

            $numerodeagendamento = count($repeatedValues);

            $userIds = $agendamentos->pluck('user_id')->toArray();
            $numeroDeCliente = array_unique($userIds);
            $numeroDeClientes = count($numeroDeCliente);

            $counted = collect($userIds)->countBy();

            $numerodaFrequencia = $counted->max();
            $quemMaisfrequentou =  $counted->sortDesc()->keys()->first();


            $cliente = User::findOrFail($quemMaisfrequentou);
            $nomeCompleto = $cliente->name;
            $partesDoNome = explode(' ', $nomeCompleto);
            $primeiroNome = $partesDoNome[0];




            $mediaProduto = DB::table('avaliacao_produtos')
                ->where('business_id', $id)
                ->where('idServicos', $idServicos)
                ->select(DB::raw('AVG(nota) as media'))
                ->get();


            $avaliacao = avaliacao_produto::where('business_id', $id)
                ->where('idServicos', $idServicos)
                ->orderBy('updated_at', 'desc')
                ->paginate(20);

            $dadosavaliacao = [];

            foreach ($avaliacao as $avaliacaoItem) {
                $nota = $avaliacaoItem->nota;
                $data = $avaliacaoItem->updated_at;
                $dataFormatada = \Carbon\Carbon::parse($data)->format('d/m/Y');
                $usuario = User::find($avaliacaoItem->usuario_id);

                if ($usuario) {
                    $nome = $usuario->name;
                } else {
                    $nome = 'Sem Nome';
                }

                $dadosavaliacao[] = [
                    'nome' => $nome,
                    'nota' => $nota,
                    'data' =>  $dataFormatada,
                ];
            }




            if ($mediaProduto->count() > 0) {
                $media = $mediaProduto[0]->media;
            } else {
                $media = 0;
            }


            $dados = [
                'numeroDeagendamentoComEsseProduto' =>   $numerodeagendamento,
                'nomedoservico'    => $servicos->nomeServico,
                'image' => $servicos->imageservico,
                'media' => $media,
                'idempresa' => $empresa->id,
                'numeroDeClientes' => $numeroDeClientes,
                'nome' =>  $primeiroNome,
                'frequencia' =>  $numerodaFrequencia,
            ];
        }






        return view('Empresa.dashboard.produtosBusiness', compact('dados', 'dadosavaliacao', 'avaliacao'));
    }
}
