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

    public function storeProdutounico($id)
    {
        $user = auth()->user();
        $servico = cadastro_de_servico::where('id', $id)->first();
        $idEmpresa = $servico->cadastro_de_empresas_id;
        $empresa = cadastro_de_empresa::findOrFail($idEmpresa);





        return view(
            'Agedamentos.CadastrarAgentamentouncio',
            [
                'user' =>  $user,
                'servico' =>  $servico,
                'empresa' => $empresa

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

        // dd(
        //     $valorTotalProdutoRequestFloat,
        //     $totalbd,

        //     $servicoValordoPRoduto,
        //     $valorDoProdutoRequest,
        //     $servicoduracaohorasDoProduto,
        //     $duracaohorasDoProdutoRequest,
        //     $servicoduracaoMinutosDoProduto,
        //     $duracaoMinutosDoProdutoRequest
        // );



        if (
            $valorTotalProdutoRequest ==  $totalbd && $servicoValordoPRoduto == $valorDoProdutoRequest
            &&  $servicoduracaohorasDoProduto ==  $duracaohorasDoProdutoRequest
            && $servicoduracaoMinutosDoProduto == $duracaoMinutosDoProdutoRequest
            && empty($comparisonNomeDdComNOmeRequest) && $comparasionFormadepagamento

        ) {
            $Agendamento->create($data);
            return redirect('/meus/agendamentos')->with('msg', 'Agendado com sucesso!');
        } else {
            return redirect('/')->with('msgErro', 'Modicação não permitida!');
        }
    }

    public function createProdutounico(Request $request, Agendamento $Agendamento)
    {
        $user = auth()->user();

        $idservico = $request->input('idServiçoAgendamento');
        $idEmpresa =  $request->input('cadastro_de_empresas_id'); // id da empresa para fazer a busca
        $empresa = cadastro_de_empresa::findOrFail($idEmpresa); // busca dados empresa

        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)
            ->whereIn('id',  $idservico)
            ->get();


        $data = $request->all(); // dados da pagina

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


        //  dd(
        //     $valorTotalProdutoRequestFloat,
        //     $totalbd,

        //     $servicoValordoPRoduto,
        //     $valorDoProdutoRequest,
        //     $servicoduracaohorasDoProduto,
        //     $duracaohorasDoProdutoRequest,
        //     $servicoduracaoMinutosDoProduto,
        //     $duracaoMinutosDoProdutoRequest
        // );

        if (
            $valorTotalProdutoRequest ==  $totalbd && $servicoValordoPRoduto == $valorDoProdutoRequest
            &&  $servicoduracaohorasDoProduto ==  $duracaohorasDoProdutoRequest
            && $servicoduracaoMinutosDoProduto == $duracaoMinutosDoProdutoRequest
            && empty($comparisonNomeDdComNOmeRequest) && $comparasionFormadepagamento

        ) {
            $Agendamento->create($data);
            return redirect('/meus/agendamentos')->with('msg', 'Agendado com sucesso!');
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
            ->get();


        $idempresa = $agendamentos->pluck('cadastro_de_empresas_id');


        $empresa = cadastro_de_empresa::whereIn('id', $idempresa)->get()->toArray();



        return view('Agedamentos.DetalhesAgendamentos', [
            'agendamentos' => $agendamentos,
            'user' => $user,
            'empresa' =>  $empresa,

        ]);
    }

    public function showdetalhesagendametnosempresa($id)
    {

        $user = auth()->user();

        $empresa = cadastro_de_empresa::findOrFail($id);

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $clienteagendamento = Agendamento::where('cadastro_de_empresas_id', $id)
            ->orderBy('dataHorarioAgendamento', 'asc')
            ->paginate(9);
            $userIds = [];
            foreach ($clienteagendamento as $agendamento) {
                $userIds[] = $agendamento->user_id;
            }
            $users = User::whereIn('id', $userIds)->get();
        }




        return view('Agedamentos.EmpresaMeusAgendamentos', [
            'clienteagendamento' => $clienteagendamento,
            'users' => $users,
            'empresa' =>$empresa,
        ]);
    }
}
