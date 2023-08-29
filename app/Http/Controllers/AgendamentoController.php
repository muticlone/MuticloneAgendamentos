<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;
use App\Models\Agendamento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;



class AgendamentoController extends Controller


{



    public function create(Request $request)
    {

        $user = auth()->user();


        $idEmpresa =  $request->input('idempresa');




        $id = $request->input('servico');









        $idArray = array_keys($id);
        $servico = cadastro_de_servico::whereIn('id', $idArray)->get();


        $encryptedIds = [];

        foreach ($servico as $item) {
            $encryptedIds[] = Crypt::encrypt($item->id);
        }









        $empresa = cadastro_de_empresa::findOrFail($idEmpresa);
        $empresa_id = $empresa->id;
        $empresa_id_criptografado = encrypt($empresa_id);


        $clienteagendamento = Agendamento::where('cadastro_de_empresas_id', $idEmpresa)->get();

        $quantidadeItens = count($clienteagendamento);


        $numeroDopedio =  $quantidadeItens + 1;


        return view(
            'Agedamentos.Clientes.ClientesCadastrarAgentamento',
            [
                'servico' =>  $servico, 'empresa' => $empresa,
                'user' =>  $user,
                'numeroDopedio' =>  $numeroDopedio,
                'empresa_id_criptografado' => $empresa_id_criptografado,
                'encryptedIds' =>  $encryptedIds
            ]
        );
    }

    public function storeProdutounico($id)
    {
        $user = auth()->user();
        $servico = cadastro_de_servico::where('id', $id)->first();

        $idEmpresa = $servico->cadastro_de_empresas_id;
        $empresa = cadastro_de_empresa::findOrFail($idEmpresa);

        $clienteagendamento = Agendamento::where('cadastro_de_empresas_id', $idEmpresa)->get();

        $quantidadeItens = count($clienteagendamento);


        $numeroDopedio =  $quantidadeItens + 1;



        return view(
            'Agedamentos.Clientes.ClientesCadastrarAgentamentouncio',
            [
                'user' =>  $user,
                'servico' =>  $servico,
                'empresa' => $empresa,
                'numeroDopedio' =>  $numeroDopedio

            ]
        );
    }


    public function store(Request $request, Agendamento $Agendamento)
    {

        $user = auth()->user();
        // $data = $request->all();



        $idservico = $request->input('idServiçoAgendamento');
        $idEmpresa =  $request->input('cadastro_de_empresas_id');

        try {
            $empresa_id_desencriptado = decrypt($idEmpresa);
            $decryptedArray = [];

            foreach ($idservico as $encryptedValue) {
                $decryptedValue = Crypt::decrypt($encryptedValue);
                $decryptedArray[] = $decryptedValue;
            }

            $empresa = cadastro_de_empresa::findOrFail($empresa_id_desencriptado);

            $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $empresa_id_desencriptado)
                ->whereIn('id',  $decryptedArray)
                ->get();
        } catch (DecryptException $e) {

            return redirect('/')->with('msgErro', 'Modicação não permitida!');
        }






        $formaDepagamentoAgendamento = $request->input('formaDepagamentoAgendamento');
        $dataHorarioAgendamento =  $request->input('dataHorarioAgendamento');
        $numeroDoPedido =  $request->input('numeroDoPedido');


        // dados bd
        $servicoNome = $servico->pluck('nomeServico')->toArray();
        $servicoValordoPRoduto = $servico->pluck('valorDoServico')->toArray();
        $totalbd = array_sum($servicoValordoPRoduto);
        $servicoduracaohorasDoProduto = $servico->pluck('duracaohoras')->toArray();
        $servicoduracaoMinutosDoProduto = $servico->pluck('duracaominutos')->toArray();
        $empresaformadepagamento = $empresa->formaDePagamento;
        $idempresa =  $empresa->id;
        $user_id =  $user->id;

        $validator = Validator::make($request->all(), [


            'formaDepagamentoAgendamento' => [
                'required',
                function ($attribute, $value, $fail) use ($empresaformadepagamento) {
                    $selectedMethods = explode(',', $value);

                    $validSelected = false;
                    foreach ($selectedMethods as $selectedMethod) {
                        if (in_array($selectedMethod, $empresaformadepagamento)) {
                            $validSelected = true;
                            break;
                        }
                    }

                    if (!$validSelected) {
                        $fail("Modicação não permitida!");
                    }
                },
            ],
            'dataHorarioAgendamento' => [
                'required',
                'date_format:Y-m-d\TH:i',
            ],


        ]);

        if ($validator->fails()) {
            return redirect('/')->with('msgErro', 'Modicação não permitida!');
        }






        $agendamento = new Agendamento;
        $agendamento->valorTotalAgendamento =  $totalbd;
        $agendamento->duracaohorasAgendamento =   $servicoduracaohorasDoProduto;
        $agendamento->duracaominutosAgendamento =  $servicoduracaoMinutosDoProduto;
        $agendamento->valorUnitatioAgendamento = $servicoValordoPRoduto;
        $agendamento->nomeServiçoAgendamento =  $servicoNome;
        $agendamento->formaDepagamentoAgendamento = $formaDepagamentoAgendamento;
        $agendamento->dataHorarioAgendamento = $dataHorarioAgendamento;
        $agendamento->user_id = $user_id;
        $agendamento->cadastro_de_empresas_id  =  $idempresa;
        $agendamento->numeroDoPedido = $numeroDoPedido;


        $agendamento->save();

        return redirect('/meus/agendamentos/ativos')->with('msg', 'Agendado com sucesso!');
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
        // $valorTotalProdutoRequestFloat = floatval($valorTotalProdutoRequest);
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
            return redirect('/meus/agendamentos/ativos')->with('msg', 'Agendado com sucesso!');
        } else {
            return redirect('/')->with('msgErro', 'Modicação não permitida!');
        }
    }


    public function showAgendamentosEmpresa($id, $status)
    {
        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $query = Agendamento::where('cadastro_de_empresas_id', $id)
                ->orderByRaw('confirmado ASC, dataHorarioAgendamento ASC');

            switch ($status) {
                case 'ativos':
                    $query->where('finalizado', 0)
                        ->where('cancelado', 0);
                    break;
                case 'pendentes':
                    $query->where('confirmado', 0)
                        ->where('cancelado', 0);
                    break;
                case 'confirmados':
                    $query->where('confirmado', 1)
                        ->where('finalizado', 0)
                        ->where('cancelado', 0);
                    break;
                case 'finalizados':
                    $query->where('finalizado', 1)
                        ->where('cancelado', 0)
                        ->orderBy('updated_at', 'desc');
                    break;
                case 'cancelados':
                    $query->where('cancelado', 1)
                        ->orderBy('updated_at', 'desc');
                    break;
            }

            $clienteagendamento = $query->paginate(9);
            $userIds = $clienteagendamento->pluck('user_id')->toArray();
            $users = User::whereIn('id', $userIds)->get();

            $statuses = [
                'ativos' => false,
                'pendentes' => false,
                'confirmados' => false,
                'finalizados' => false,
                'cancelados' => false,
            ];
            $statuses[$status] = true;

            return view('Agedamentos.Empresa.EmpresaMeusAgendamentos', [
                'clienteagendamento' => $clienteagendamento,
                'users' => $users,
                'empresa' => $empresa,
                'statuses' => $statuses,
            ]);
        }
    }

    public function showAgendamentosEmpresaDetalhes($id, $idEmpresa)
    {
        $user = auth()->user();

        $empresa = cadastro_de_empresa::findOrFail($idEmpresa);

        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            $clienteagendamento = Agendamento::findOrfail($id);
            $id_user = $clienteagendamento->user_id;
            $users = User::findOrfail($id_user);
        }


        return view(
            'Agedamentos.Empresa.EmpresaDetalhesAgendamentos',
            [
                'agendamento' =>  $clienteagendamento,
                'user' =>   $users,
                'empresa' => $empresa,
            ]


        );
    }

    public function confirmarPedidoEmpresa(Request $request)
    {


        $agendamento = Agendamento::findOrFail($request->id);
        $empresa =  $agendamento->cadastro_de_empresas_id;
        $agendamento->confirmado = true;
        $agendamento->save();
        return redirect('/meus/agendamentos/empresa/' .  $empresa . '/ativos')->with('msg', 'Confirmado com sucesso!');
    }

    public function finalizarPedidoEmpresa(Request $request)
    {
        $agendamento = Agendamento::findOrFail($request->id);
        $empresa =  $agendamento->cadastro_de_empresas_id;
        $agendamento->finalizado = true;
        $agendamento->save();
        return redirect('/meus/agendamentos/empresa/' .  $empresa . '/finalizados')->with('msg', 'Finalizado com sucesso!');
    }

    public function cancelarPedidoEmpresa(Request $request)
    {

        $urlAnterior = URL::previous();


        $motivoCacelamento =  $request->motivoCacelamento;
        $agendamento = Agendamento::findOrFail($request->id);
        $agendamento->confirmado = false;
        $agendamento->finalizado = false;
        $agendamento->cancelado = true;
        $agendamento->motivoCancelamento =  $motivoCacelamento;
        $agendamento->save();
        $empresa =  $agendamento->cadastro_de_empresas_id;

        if (Str::contains($urlAnterior, '/meus/clientes/agendamentos/detalhes/')) {

            return redirect('/meus/agendamentos/empresa/' . $empresa . '/cancelados')->with('msg', 'Cancelado com sucesso!');
        } else {
            return redirect('/meus/agendamentos/cancelados')->with('msg', 'Cancelado com sucesso!');
        }
    }

    public function ReagendarPedidoEmpresaEcliente(Request $request)
    {


        $urlAnterior = URL::previous();
        $novaData =  $request->dataHorarioAgendamento;
        $agendamento = Agendamento::findOrFail($request->id);
        $agendamento->confirmado = false;
        $agendamento->finalizado = false;
        $agendamento->cancelado = false;
        $agendamento->dataHorarioAgendamento =   $novaData;
        $agendamento->save();
        $empresa =  $agendamento->cadastro_de_empresas_id;


        if (Str::contains($urlAnterior, '/meus/clientes/agendamentos/detalhes/')) {

            return redirect('/meus/agendamentos/empresa/' .  $empresa . '/pendentes')->with('msg', 'Reagendado com sucesso!');
        } else {
            return redirect('/meus/agendamentos/pendentes')->with('msg', 'Reagendado com sucesso!');
        }
    }




    public function show_Agendamentos_Clientes($status)
    {
        /** @var \App\User $user */
        $user = auth()->user();

        $query = $user->agendamentos()
            ->orderByRaw('confirmado ASC, dataHorarioAgendamento ASC');

        switch ($status) {
            case 'ativos':
                $query->where('finalizado', 0)
                    ->where('cancelado', 0);
                break;
            case 'pendentes':
                $query->where('confirmado', 0)
                    ->where('cancelado', 0);
                break;
            case 'confirmados':
                $query->where('confirmado', 1)
                    ->where('finalizado', 0)
                    ->where('cancelado', 0);
                break;
            case 'finalizados':
                $query->where('finalizado', 1)
                    ->where('cancelado', 0)
                    ->orderBy('updated_at', 'desc');
                break;
            case 'cancelados':
                $query->where('cancelado', 1)
                    ->orderBy('updated_at', 'desc');
                break;
        }

        $agendamentos = $query->paginate(9);

        $idempresa = $agendamentos->pluck('cadastro_de_empresas_id')->unique();
        $empresaAgendamento = cadastro_de_empresa::whereIn('id', $idempresa)->get();

        $statuses = [
            'ativos' => false,
            'pendentes' => false,
            'confirmados' => false,
            'finalizados' => false,
            'cancelados' => false,
        ];
        $statuses[$status] = true;

        return view('Agedamentos.Clientes.ClientesMeusAgendamentos', [
            'agendamentos' => $agendamentos,
            'empresaAgendamento' => $empresaAgendamento,
            'statuses' => $statuses,

        ]);
    }




    public function show_Agendamentos_Detalhes_Clientes($id)
    {


        /** @var \App\User $user */
        $user = auth()->user();

        $agendamentos = $user->agendamentos()
            ->where('id', $id)
            ->get();



        $idempresa = $agendamentos->pluck('cadastro_de_empresas_id');


        $empresa = cadastro_de_empresa::whereIn('id', $idempresa)->get()->toArray();



        return view('Agedamentos.Clientes.ClientesDetalhesAgendamentos', [
            'agendamentos' => $agendamentos,
            'user' => $user,
            'empresa' =>  $empresa,

        ]);
    }







    public function avaliacaoPedidoCliente(Request $request)
    {


        $nota = intval($request->input('nota'));

        $comentario =  $request->comentario;



        $agendamento = Agendamento::findOrFail($request->id);

        $agendamento->nota = $nota;
        $agendamento->comentario =  $comentario;
        $agendamento->save();


        return redirect('/meus/agendamentos/finalizados')->with('msg', 'Enviado com sucesso!');
    }
}
