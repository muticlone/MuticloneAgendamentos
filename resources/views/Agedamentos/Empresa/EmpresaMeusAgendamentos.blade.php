@extends('Layout.main')

@section('title', 'Meus clientes')

@section('conteudo')

    <div class="col-12 pt-1 ">

        <x-menu_agendamentos empresa_id="{{ $empresa->id }}" />
            @if (count($clienteagendamento) > 0)
            @php
                $decodedNomesClientes = htmlspecialchars_decode($nomesClientes);
            @endphp
            <x-agendamentos_clientes :clienteagendamento="$clienteagendamento" empresa_nomeFantasia="{{ $empresa->nomeFantasia }}" empresa_id="{{ $empresa->id }}" :nomesClientes="$decodedNomesClientes" />
        @else
        <x-verifica-cliente-atendimento :status="$statuses" />
        @endif
    </div>

    <x-pagination :paginatedItems="$clienteagendamento" />

    <script src="/js/Atualizar.js"></script>



@endsection
