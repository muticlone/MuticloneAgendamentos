@extends('Layout.main')




@section('title', 'Meus clientes')


@section('conteudo')



    <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">

        <x-meu-meus-clientes empresa_id="{{ $empresa->id }}" />


    </div>



    <div class="col-md-9 offset-md-1 pt-2">

        <div class="row">

            <form action="{{ route('dados.meus.clientes', ['id' => $empresa->id, 'status' => 'busca']) }}" method="GET"
                id="searchForm">

                <x-btn-busca idbtn="search" name="search" />
            </form>
        </div>

        <x-alert-busca-agendamento search="{{ $search }}" href="/dados/meus/clientes/{{ $empresa->id }}/ativos" />

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
                                        {{ \Carbon\Carbon::createFromFormat('d/m/Y', $dados['data_hora_finalizacao_agendamento'])->format('d-m-Y') }}
                                    @endif
                                @endforeach
                            </td>


                            <td>




                                <x-btn-whatsapp numero="{{ str_replace(['(', ')', ' ', '-'], '', $cliente->phone) }}"
                                    mensagem="Olá! {{ $cliente->name }} Sentimos sua falta e estamos ansiosos para recebê-lo de volta. Como podemos ajudar você hoje?"
                                    detalhes="{{ $cliente->id }}" idempresa="{{ $empresa->id }}" />


                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @if ($clientesOrdenados->count() === 0 && $search)
            <div class="alert alert-warning pt-2" role="alert">
                Não foi possível encontrar nenhuma serviço com: "{{ $search }}"</a>
            </div>
        @elseif($clientesOrdenados->count() === 0)
            <div class="alert alert-warning pt-2" role="alert">
                Não há eventos disponíveis
            </div>
        @endif
    </div>


    <x-pagination :paginatedItems="$clientes" />

@endsection
<script src="/js/select2.js"></script>
