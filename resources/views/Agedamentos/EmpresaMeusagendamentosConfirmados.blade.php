@extends('Layout.main')

@section('title', 'Meus clientes')

@section('conteudo')

    <div class="col-12 pt-1 ">

        <x-menu_agendamentos empresa_id="{{ $empresa->id }}" />
        <x-agendamentos_clientes :clienteagendamento="$clienteagendamento" empresa_nomeFantasia="{{ $empresa->nomeFantasia }}"
            empresa_id="{{ $empresa->id }}" />
    </div>
    <x-pagination :paginatedItems="$clienteagendamento" />




@endsection
