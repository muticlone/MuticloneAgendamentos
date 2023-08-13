<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;
use App\Models\Agendamento;
use App\Models\User;

class AgendamentoController extends Controller


{



    public function create(Request $request)
    {

        $user = auth()->user();


        $idEmpresa =  $request->input('idempresa');

        $id = $request->input('servico');

        $idArray = array_keys($id);

        $servico = cadastro_de_servico::whereIn('id', $idArray)->get();

        $empresa = cadastro_de_empresa::findOrFail($idEmpresa);



        return view(
            'Agedamentos.CadastrarAgentamento',
            [
                'servico' =>  $servico, 'empresa' => $empresa,
                'user' =>  $user
            ]
        );
    }


    public function store(Request $request, Agendamento $Agendamento)
    {
        $user = auth()->user();




        $data = $request->all(); // dados da pagina



        $idservico = $request->input('idServiçoAgendamento');
        $idEmpresa =  $request->input('cadastro_de_empresas_id'); // id da empresa para fazer a busca
        $empresa = cadastro_de_empresa::findOrFail($idEmpresa); // busca dados empresa

        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)
            ->whereIn('id',  $idservico)
            ->get();

        // Dados da requisição
        $NomeDoProdutoRequest = $request->input('nomeServiçoAgendamento');
        $valorDoProdutoRequest = $request->input('valorUnitatioAgendamento');
        $valorTotalProdutoRequest = $request->input('valorTotalAgendamento');
        $valorTotalProdutoRequestFloat = floatval($valorTotalProdutoRequest);
        $duracaohorasDoProdutoRequest = $request->input('duracaohorasAgendamento');
        $duracaoMinutosDoProdutoRequest = $request->input('duracaominutosAgendamento');
        $formadepagamentoRequest = $request->input('formaDepagamentoAgendamento');
        $formaDePagamentoArray = array($formadepagamentoRequest);


        // dados bd
        $servicoNome = $servico->pluck('nomeServico')->toArray();
        $servicoValordoPRoduto = $servico->pluck('valorDoServico')->toArray();
        $totalbd = array_sum($servicoValordoPRoduto);
        // $totalbdformat = number_format( $totalbd, 2, ',', '.');









        $servicoduracaohorasDoProduto = $servico->pluck('duracaohoras')->toArray();
        $servicoduracaoMinutosDoProduto = $servico->pluck('duracaominutos')->toArray();
        $empresaformadepagamento = $empresa->formaDePagamento;





        $comparisonNomeDdComNOmeRequest = array_diff($servicoNome, $NomeDoProdutoRequest);
        $comparasionFormadepagamento = array_intersect($formaDePagamentoArray,  $empresaformadepagamento);

        dd(
            $valorTotalProdutoRequestFloat,
            $totalbd,

            $servicoValordoPRoduto,
            $valorDoProdutoRequest,
            $servicoduracaohorasDoProduto,
            $duracaohorasDoProdutoRequest,
            $servicoduracaoMinutosDoProduto,
            $duracaoMinutosDoProdutoRequest
        );



        if (
            $valorTotalProdutoRequest ==  $totalbd && $servicoValordoPRoduto == $valorDoProdutoRequest
            &&  $servicoduracaohorasDoProduto ==  $duracaohorasDoProdutoRequest
            && $servicoduracaoMinutosDoProduto == $duracaoMinutosDoProdutoRequest
            && empty($comparisonNomeDdComNOmeRequest) && $comparasionFormadepagamento

        ) {
            $Agendamento->create($data);
            return redirect('/dashboard')->with('msg', 'Agendado com sucesso!');
        } else {
            return redirect('/')->with('msgErro', 'Modicação não permitida!');
        }
    }

    public function show()
    {
        /** @var \App\User $user */
        $user = auth()->user();

        $agendamentos = $user->agendamentos()
            ->orderBy('dataHorarioAgendamento', 'asc')
            ->paginate(10);


        $idempresa = $agendamentos->pluck('cadastro_de_empresas_id')->unique();
        $empresaAgendamento = cadastro_de_empresa::whereIn('id', $idempresa)->get();


        return view('Agedamentos.MeusAgendamentos', [
            'agendamentos' => $agendamentos,
            'empresaAgendamento' => $empresaAgendamento,
        ]);
    }

    public function showdetalhes($id)
    {
        /** @var \App\User $user */
        $user = auth()->user();

        $agendamentos = $user->agendamentos()
            ->where('id', $id)
            ->paginate(10);


        return view('Agedamentos.DetalhesAgendamentos', [
            'agendamentos' => $agendamentos,

        ]);
    }
}
