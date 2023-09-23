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
use Illuminate\Pagination\LengthAwarePaginator;



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
        $empresa_id = $empresa->id;
        $empresa_id_criptografado = encrypt($empresa_id);


        $clienteagendamento = Agendamento::where('cadastro_de_empresas_id', $idEmpresa)->get();

        $quantidadeItens = count($clienteagendamento);


        $numeroDopediodescript =  $quantidadeItens + 1;
        $numeroDopedio = encrypt($numeroDopediodescript);



        return view(
            'Agedamentos.Clientes.ClientesCadastrarAgentamento',
            [
                'servico' =>  $servico, 'empresa' => $empresa,
                'user' =>  $user,
                'numeroDopedio' =>  $numeroDopedio,
                'empresa_id_criptografado' => $empresa_id_criptografado,

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

        $empresa_id = $empresa->id;
        $empresa_id_criptografado = encrypt($empresa_id);


        $numeroDopediodescript =  $quantidadeItens + 1;
        $numeroDopedio = encrypt($numeroDopediodescript);



        return view(
            'Agedamentos.Clientes.ClientesCadastrarAgentamentouncio',
            [
                'user' =>  $user,
                'servico' =>  $servico,
                'empresa' => $empresa,
                'numeroDopedio' =>  $numeroDopedio,
                'empresa_id_criptografado' => $empresa_id_criptografado,


            ]
        );
    }


    public function createNewAgendamento(Request $request, Agendamento $Agendamento)
    {

        $user = auth()->user();


        $idservico = $request->input('idServiçoAgendamento');

        $idEmpresa =  $request->input('cadastro_de_empresas_id');

        try {
            $numeroDoPedidoincript =  $request->input('numeroDoPedido');
            $numeroDoPedido = decrypt($numeroDoPedidoincript);

            $formaDepagamentoAgendamentoincript = $request->input('formaDepagamentoAgendamento');
            $formaDepagamentoAgendamento = decrypt($formaDepagamentoAgendamentoincript);


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


        $dataHorarioAgendamento =  $request->input('dataHorarioAgendamento');

        // dados bd
        $servicoNome = $servico->pluck('nomeServico')->toArray();
        $servicoValordoPRoduto = $servico->pluck('valorDoServico')->toArray();

        $totalbd = array_sum($servicoValordoPRoduto);




        $servicoduracaohorasDoProduto = $servico->pluck('duracaohoras')->toArray();
        $servicoduracaoMinutosDoProduto = $servico->pluck('duracaominutos')->toArray();
        $idempresa =  $empresa->id;
        $user_id =  $user->id;

        $validator = Validator::make($request->all(), [
            'dataHorarioAgendamento' => [
                'required',
                'date_format:Y-m-d\TH:i',
            ],
            'valorTotalAgendamento' => [
                'required',
                function ($attribute, $value, $fail) use ($totalbd) {
                    if ($value != $totalbd) {
                        $fail("$attribute Modicação não permitida!");
                    }
                },
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

    public function createAgendamentoProdutoUnico(Request $request, Agendamento $Agendamento)
    {
        $user = auth()->user();

        $idservico = $request->input('idServiçoAgendamento');
        $idEmpresa =  $request->input('cadastro_de_empresas_id');

        $formaDepagamentoAgendamentoincript = $request->input('formaDepagamentoAgendamento');
        $formaDepagamentoAgendamento = decrypt($formaDepagamentoAgendamentoincript);


        try {

            $numeroDoPedidoincript =  $request->input('numeroDoPedido');
            $numeroDoPedido = decrypt($numeroDoPedidoincript);

            $empresa_id_desencriptado = decrypt($idEmpresa);
            $idServico = [];

            foreach ($idservico as $encryptedValue) {
                $decryptedValue = Crypt::decrypt($encryptedValue);
                $idServico[] = $decryptedValue;
            }

            $empresa = cadastro_de_empresa::findOrFail($empresa_id_desencriptado);

            $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $empresa_id_desencriptado)
                ->whereIn('id', $idServico)
                ->get();
        } catch (DecryptException $e) {

            return redirect('/')->with('msgErro', 'Modicação não permitida!');
        }


        $dataHorarioAgendamento =  $request->input('dataHorarioAgendamento');

        // dados bd
        $servicoNome = $servico->pluck('nomeServico')->toArray();
        $servicoValordoPRoduto = $servico->pluck('valorDoServico')->toArray();

        $totalbd = array_sum($servicoValordoPRoduto);




        $servicoduracaohorasDoProduto = $servico->pluck('duracaohoras')->toArray();
        $servicoduracaoMinutosDoProduto = $servico->pluck('duracaominutos')->toArray();
        $idempresa =  $empresa->id;
        $user_id =  $user->id;

        $validator = Validator::make($request->all(), [
            'dataHorarioAgendamento' => [
                'required',
                'date_format:Y-m-d\TH:i',
            ],
            'valorTotalAgendamento' => [
                'required',
                function ($attribute, $value, $fail) use ($totalbd) {
                    if ($value != $totalbd) {
                        $fail("$attribute Modicação não permitida!");
                    }
                },
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


    public function showAgendamentosEmpresa($id, $status)
    {
        $user = auth()->user();
        $empresa = cadastro_de_empresa::findOrFail($id);
        $search = request('search');
        $searchdate = request('searchdate');




        $nomes = Agendamento::where('cadastro_de_empresas_id', $id);


        $nomesClientes = $nomes->distinct()
            ->join('users', 'agendamentos.user_id', '=', 'users.id')
            ->pluck('users.name')
            ->toArray();



        $numerosDosPedidos = Agendamento::where('cadastro_de_empresas_id', $id)
            ->pluck('numeroDoPedido')->toArray();

        $formaDepagamentoAgendamento = Agendamento::where('cadastro_de_empresas_id', $id)
            ->distinct()
            ->pluck('formaDepagamentoAgendamento')
            ->toArray();








        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {
            if ($search || $searchdate) {




                $query = Agendamento::where('cadastro_de_empresas_id', $id);

                if ($searchdate) {


                    $query->whereDate('dataHorarioAgendamento', '=', $searchdate);
                } else {

                    $idsCliente = $nomes->distinct()
                        ->join('users as agendamento_users', 'agendamentos.user_id', '=', 'agendamento_users.id')
                        ->where('agendamento_users.name', '=', $search)
                        ->pluck('agendamento_users.id');

                    // Verifica se há resultados para o nome de cliente pesquisado
                    if (count($idsCliente) > 0) {
                        $query->whereIn('user_id', $idsCliente);
                    } else if (is_numeric($search)) {

                        $query->where('numeroDoPedido', '=',  $search);

                    } else if (true){

                        $query->where('formaDepagamentoAgendamento', '=', $search);
                    }
                }
            } else {

                $query = Agendamento::where('cadastro_de_empresas_id', $id)
                    ->orderByRaw('confirmado ASC, dataHorarioAgendamento ASC');
            }




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
                        ->orderBy('data_hora_finalizacao_agendamento', 'desc');
                    break;
                case 'cancelados':
                    $query->where('cancelado', 1)
                        ->orderBy('data_hora_cancelamento_agendamento', 'desc');
                    break;

                case 'todos':
                    $query->where('cadastro_de_empresas_id', $id)
                        ->orderBy('data_hora_finalizacao_agendamento', 'desc');
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
                'todos' => false,
            ];
            $statuses[$status] = true;





            return view('Agedamentos.Empresa.EmpresaMeusAgendamentos', [
                'clienteagendamento' => $clienteagendamento,
                'users' => $users,
                'empresa' => $empresa,
                'statuses' => $statuses,
                'nomesClientes' => $nomesClientes,
                'search' => $search,
                'numerosDosPedidos' =>  $numerosDosPedidos,
                'searchdate' =>  $searchdate,
                'formaDepagamentoAgendamento' => $formaDepagamentoAgendamento,

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
        $agendamento->data_hora_finalizacao_agendamento = Carbon::now();
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
        $agendamento->data_hora_cancelamento_agendamento = Carbon::now();
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




    public function show_Agendamentos_Clientes($status, Request $request)
    {
        /** @var \App\User $user */
        $user = auth()->user();
        $search = request('search');
        $searchdate = request('searchdate');
        $idsempresas = $request->input('idEmpresa');

        // aqui
        $formaDepagamentoAgendamento = $user->agendamentos()
            ->distinct()
            ->pluck('formaDepagamentoAgendamento')
            ->toArray();


        $numerosDosPedidos = $user->agendamentos()
            ->distinct()
            ->pluck('numeroDoPedido')->toArray();

        sort($numerosDosPedidos);




        if ($search || $searchdate) {

            if (in_array($search, $formaDepagamentoAgendamento)) {

                $query = $user->agendamentos()->where('formaDepagamentoAgendamento', '=', $search);
            } elseif ($searchdate) {
                $query = $user->agendamentos()->whereDate('dataHorarioAgendamento', '=', $searchdate);
            } elseif ($search) {
                $iddescipt = [];

                foreach ($idsempresas as $encryptedValue) {
                    $decryptedValue = Crypt::decrypt($encryptedValue);
                    $iddescipt[] = $decryptedValue;
                }



                $empresaAgendamentoid = cadastro_de_empresa::where('nomeFantasia', $search)
                    ->whereIn('id', $iddescipt)
                    ->pluck('id');


                $query = $user->agendamentos()->whereIn('cadastro_de_empresas_id', $empresaAgendamentoid);
            }

            if (is_numeric($search)) {
                $query = $user->agendamentos()->where('numeroDoPedido', '=', $search);
            }
        } else {
            $query = $user->agendamentos()
                ->orderByRaw('confirmado ASC, dataHorarioAgendamento ASC');
        }





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
                    ->orderBy('data_hora_finalizacao_agendamento', 'desc');
                break;
            case 'cancelados':
                $query->where('cancelado', 1)
                    ->orderBy('data_hora_cancelamento_agendamento', 'desc');
                break;

            case 'todos':
                $user->agendamentos();
                break;
        }

        $agendamentos = $query->paginate(9);



        $idempresa =  $user->agendamentos()->pluck('cadastro_de_empresas_id')->unique();

        $empresaAgendamento = cadastro_de_empresa::whereIn('id', $idempresa)->get();

        $NomesDasEmpresas = [];
        foreach ($empresaAgendamento as $empresa) {
            $nomeFormatado = ucwords(strtolower($empresa->nomeFantasia));
            $NomesDasEmpresas[] = $nomeFormatado;
        }



        $statuses = [
            'ativos' => false,
            'pendentes' => false,
            'confirmados' => false,
            'finalizados' => false,
            'cancelados' => false,
            'todos' => false,
        ];
        $statuses[$status] = true;

        return view('Agedamentos.Clientes.ClientesMeusAgendamentos', [
            'agendamentos' => $agendamentos,
            'empresaAgendamento' => $empresaAgendamento,
            'statuses' => $statuses,
            'NomesDasEmpresas' => $NomesDasEmpresas,
            'search' => $search,
            'searchdate' =>  $searchdate,
            'formaDepagamentoAgendamento' => $formaDepagamentoAgendamento,
            'numerosDosPedidos' =>  $numerosDosPedidos
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



        if ($encontrado == false)  {
            return redirect('/dashboard');
        } else {



            $clientesBusca =  User::findOrFail($id);
            $agendamentos = Agendamento::where('user_id', $id)
            ->where('cadastro_de_empresas_id',$idempresa)
            ->where('finalizado', 1)
            ->where('cancelado', 0)
            ->get();

            $agendamentoscancelados = Agendamento::where('user_id', $id)
            ->where('cadastro_de_empresas_id',$idempresa)
            ->where('cancelado', 1)
            ->get();

            $agendamentosnaoconfirmados = Agendamento::where('user_id', $id)
            ->where('cadastro_de_empresas_id',$idempresa)
            ->where('finalizado', 0)
            ->where('confirmado', 0)
            ->where('cancelado', 0)
            ->get();

            $agendamentonaoavaliado = Agendamento::where('user_id', $id)
            ->where('cadastro_de_empresas_id',$idempresa)
            ->where('finalizado', 1)
            ->where('cancelado', 0)
            ->where('nota', null)
            ->get();

            $data = Agendamento::where('user_id', $id)
            ->where('cadastro_de_empresas_id',$idempresa)
            ->where('finalizado', 1)
            ->where('cancelado', 0)
            ->selectRaw('max(data_hora_finalizacao_agendamento) as data_hora_finalizacao_agendamento')
            ->pluck('data_hora_finalizacao_agendamento');

            $originalDateString = $data[0];
            $carbonDate = Carbon::parse($originalDateString);
            $formattedDate = $carbonDate->format('d-m-Y');







        }

        $numeroDoPedidos = count($agendamentos);

        $numeroDeCanelados = count( $agendamentoscancelados);

        $numeroDenaoconfirmados = count(  $agendamentosnaoconfirmados);

        $numeroDenaoavaliados = count(   $agendamentonaoavaliado);

        $totalDepedidos =  $numeroDoPedidos +  $numeroDeCanelados;

        if (  $totalDepedidos > 0) {
            $porcentagemDeCancelamento = ($numeroDeCanelados /   $totalDepedidos) * 100;
        } else {
            $porcentagemDeCancelamento = 0;
        }
        $porcentagemDeCancelamento = number_format(  $porcentagemDeCancelamento,2);


        $idEmpresa = $agendamentos->pluck('cadastro_de_empresas_id')->first();
        $gasto =  $agendamentos->pluck('valorTotalAgendamento')->toArray();

        $totalgasto = array_sum($gasto);
        $totalgasto = number_format($totalgasto, 2, ',', '.');


        return view('Empresa.DadosMeuCliente', [
            'clientesBusca' =>  $clientesBusca,
            'agendamentos' =>  $agendamentos,
            'numeroDoPedidos' =>  $numeroDoPedidos,
            'idEmpresa' =>  $idEmpresa,
            'numeroDeCanelados'=> $numeroDeCanelados,
            'porcentagemDeCancelamento' => $porcentagemDeCancelamento,
            'totalgasto' => $totalgasto,
            'numeroDenaoconfirmados' =>  $numeroDenaoconfirmados,
            'numeroDenaoavaliados' =>  $numeroDenaoavaliados,
            'formattedDate' => $formattedDate,
        ]);
    }
}
