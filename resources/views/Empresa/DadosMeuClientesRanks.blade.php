@extends('Layout.main')
@section('logo', 'logo_empresa.png')
@section('title', 'Ranks')

@section('conteudo')
    <div class="col-md-9 offset-md-1 pt-2">
        <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">

            <x-meu-meus-clientes empresa_id="{{  encrypt($idempresa) }}" />


        </div>
        <form action="/cliente/ranks/{{ encrypt($idempresa) }}" method="GET" id="searchForm">
            <x-btn-busca idbtn="searchranks" name="searchBuscaranks" />
        </form>

        <x-alert-busca-home :count="$clienteComMaisAgendamentos" search="{{ $search }}"
        linktodos="cliente/ranks/{{ $idempresa  }}" tema="false" />

        <div class="row pt-2">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>

                            <th scope="col">Nome </th>

                            <th scope="col">Quantidade de agendamentos </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nomeEQuantidade as $clienteInfo)
                            <tr>

                                <td> {{ $clienteInfo['nome'] }} </td>


                                <td align="center">
                                    {{ $clienteInfo['quantidade'] }}
                                </td>


                                <td>




                                    <x-btn-whatsapp
                                        numero="{{ str_replace(['(', ')', ' ', '-'], '', $clienteInfo['phone']) }}"
                                        mensagem="Olá!  {{ $clienteInfo['nome'] }} Sentimos sua falta e estamos ansiosos para recebê-lo de volta. Como podemos ajudar você hoje?"
                                        detalhes="{{ encrypt($clienteInfo['id']) }}" idempresa="{{ encrypt($idempresa) }}" />

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>



        @if ($clienteComMaisAgendamentos->count() === 0 && $search)
            <div class="alert alert-warning pt-2" role="alert">
                Não foi possível encontrar nenhuma serviço com: "{{ $search }}" <a href="/cliente/ranks/{{ $idempresa }}">Ver todos</a>
            </div>
        @elseif($clienteComMaisAgendamentos->count() === 0)
            <div class="alert alert-warning pt-2" role="alert">
                Não há eventos disponíveis
            </div>
        @endif
    </div>


    <x-pagination :paginatedItems="$clienteComMaisAgendamentos" />
@endsection
