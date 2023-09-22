@extends('Layout.main')




@section('title', 'Meus clientes')


@section('conteudo')



    <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('dados.meus.clientes', ['id' => $empresa->id, 'status' => 'ativos']) }}"
                class="btn btn-sm btn-outline-info btndashboard">Ativos</a>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('dados.meus.clientes', ['id' => $empresa->id, 'status' => 'clientesnaoatendido']) }}"
                class="btn btn-sm btn-outline-info btndashboard">Clientes não atendidos</a>
        </div>



    </div>



    <div class="col-md-9 offset-md-1 pt-2">

        <div class="row">

            <form action="{{ route('dados.meus.clientes', ['id' => $empresa->id, 'status' => 'busca']) }}" method="GET" id="searchForm">
                <div class="col-md-4 pt-1">
                    <x-select-meus-agendamentos :agendamento="$nomesDoscleintes" :value="$nomesDoscleintes" width="100%" />
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>

                        <th scope="col">Nome </th>

                        <th scope="col">Último agendamento </th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientesOrdenados as $cliente)
                        <tr>

                            <td> {{ $cliente->name }}</td>


                            <td>
                                @foreach ($dadosClientes as $dados)
                                    @if ($dados['user_id'] == $cliente->id)
                                        {{ \Carbon\Carbon::createFromFormat('d/m/Y', $dados['updated_at'])->format('d-m-Y') }}
                                    @endif
                                @endforeach
                            </td>


                            <td>




                                <x-btn-whatsapp numero="{{ str_replace(['(', ')', ' ', '-'], '', $cliente->phone) }}"
                                    mensagem="Olá! {{ $cliente->name }} Sentimos sua falta e estamos ansiosos para recebê-lo de volta. Como podemos ajudar você hoje?" />


                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <x-pagination :paginatedItems="$clientes" />

@endsection
<script src="/js/select2.js"></script>
