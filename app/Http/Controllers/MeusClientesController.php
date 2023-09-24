<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;
use App\Models\Agendamento;
use App\Models\User;
use Carbon\Carbon;

class MeusClientesController extends Controller
{
    public function showMeusClientes($id, $status)
    {

        $user = auth()->user();

        $empresa = cadastro_de_empresa::findOrFail($id);
        $search = request('search');
        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {


            if ($search) {
            }



            $idsClientes = Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->distinct()
                ->pluck('user_id')
                ->toArray();


            $dadosClientes = Agendamento::where('cadastro_de_empresas_id', $id)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->select('user_id')
                ->selectRaw('max(data_hora_finalizacao_agendamento) as data_hora_finalizacao_agendamento')
                ->groupBy('user_id')
                ->get()
                ->toArray();



            foreach ($dadosClientes as &$datas) {
                $datas['data_hora_finalizacao_agendamento'] = date('d/m/Y', strtotime($datas['data_hora_finalizacao_agendamento']));
            }






            $clientes =  User::whereIn('id',  $idsClientes)->paginate(15);




            $clientesBusca =  User::whereIn('id', $idsClientes)->get();

            $nomesDoscleintes = [];

            foreach ($clientesBusca as $busca) {
                $nomesDoscleintes[] = $busca->name;
            }



            $clientesOrdenados = [];

            if ($status == 'ativos') {

                $clientesOrdenados = $clientes->sortByDesc(function ($cliente) use ($dadosClientes) {
                    $latestUpdatedAt = null;

                    foreach ($dadosClientes as $dados) {
                        if ($dados['user_id'] == $cliente->id) {
                            $updatedAt = \Carbon\Carbon::createFromFormat('d/m/Y', $dados['data_hora_finalizacao_agendamento']);

                            // Verifica se esta é a data de atualização mais recente para este cliente
                            if ($latestUpdatedAt === null || $updatedAt->greaterThan($latestUpdatedAt)) {
                                $latestUpdatedAt = $updatedAt;
                            }
                        }
                    }

                    return $latestUpdatedAt;
                })->values();
            } elseif ($status == 'clientesnaoatendido') {


                $clientesOrdenados = $clientes->sortBy(function ($cliente) use ($dadosClientes) {
                    foreach ($dadosClientes as $dados) {
                        if ($dados['user_id'] == $cliente->id) {
                            return \Carbon\Carbon::createFromFormat('d/m/Y', $dados['data_hora_finalizacao_agendamento']);
                        }
                    }
                })->values();
            } elseif ($status == 'busca') {


                $nomes = Agendamento::where('cadastro_de_empresas_id', $id);


                $idCliente = $nomes->distinct()
                    ->join('users as agendamento_users', 'agendamentos.user_id', '=', 'agendamento_users.id')
                    ->where('agendamento_users.name', '=', $search)
                    ->pluck('agendamento_users.id');

                $clientesOrdenados =  User::where('id',  $idCliente)->paginate(1);
            } else {
                return back();
            }
        }



        return view('Empresa.DadosMeusClientes', [
            'clientesOrdenados' =>  $clientesOrdenados,
            'clientes' => $clientes,
            'empresa' =>  $empresa,
            'dadosClientes' =>  $dadosClientes,
            'nomesDoscleintes' => $nomesDoscleintes,
            'search' => $search,

        ]);
    }


    public function showMeuCliente($id, $idempresa)
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



        if ($encontrado == false) {
            return redirect('/dashboard');
        } else {



            $clientesBusca =  User::findOrFail($id);
            $agendamentos = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->get();

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

            $agendamentoFormasdepagamento = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->distinct()
                ->pluck('formaDepagamentoAgendamento')
                ->toArray();

                $formaPagamentoContagemTotal = array_count_values(  $agendamentoFormasdepagamento);






            //     $valorMaisRepetido = $agendamentoFormadepagamento->mode();
            //     dd($valorMaisRepetido);

            $agendamentonaoavaliado = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->whereNull('nota')
                ->get();

            $dataultimo = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->max('data_hora_finalizacao_agendamento');

            $datadoultimoagendamento = date('d/m/Y', strtotime($dataultimo));


            $dataprimeiro = Agendamento::where('user_id', $id)
                ->where('cadastro_de_empresas_id', $idempresa)
                ->where('finalizado', 1)
                ->where('cancelado', 0)
                ->max('data_hora_finalizacao_agendamento');


            $dataprimeiroagendamento = date('d/m/Y', strtotime( $dataprimeiro));

            $numeroDoPedidos = count($agendamentos);

            $numeroDeCanelados = count($agendamentoscancelados);

            $numeroDenaoconfirmados = count($agendamentosnaoconfirmados);

            $numeroDenaoavaliados = count($agendamentonaoavaliado);

            $totalDepedidos =  $numeroDoPedidos +  $numeroDeCanelados;

            if ($totalDepedidos > 0) {
                $porcentagemDeCancelamento = ($numeroDeCanelados /   $totalDepedidos) * 100;
            } else {
                $porcentagemDeCancelamento = 0;
            }
            $porcentagemDeCancelamento = number_format($porcentagemDeCancelamento, 2);


            $idEmpresa = $agendamentos->pluck('cadastro_de_empresas_id')->first();
            $gasto =  $agendamentos->pluck('valorTotalAgendamento')->toArray();

            $totalgasto = array_sum($gasto);
            $totalgasto = number_format($totalgasto, 2, ',', '.');
        }




        return view('Empresa.DadosMeuCliente', [
            'clientesBusca' =>  $clientesBusca,
            'agendamentos' =>  $agendamentos,
            'numeroDoPedidos' =>  $numeroDoPedidos,
            'idEmpresa' =>  $idEmpresa,
            'numeroDeCanelados' => $numeroDeCanelados,
            'porcentagemDeCancelamento' => $porcentagemDeCancelamento,
            'totalgasto' => $totalgasto,
            'numeroDenaoconfirmados' =>  $numeroDenaoconfirmados,
            'numeroDenaoavaliados' =>  $numeroDenaoavaliados,
            'datadoultimoagendamento' =>  $datadoultimoagendamento,
            'dataprimeiroagendamento' => $dataprimeiroagendamento,
            'formaPagamentoContagemTotal' =>   $formaPagamentoContagemTotal
        ]);
    }
}
