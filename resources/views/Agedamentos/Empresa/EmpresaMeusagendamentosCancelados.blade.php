@extends('Layout.main')

@section('title', 'Meus clientes')

@section('conteudo')


    <div class="col-12 pt-1 ">

        <x-menu_agendamentos empresa_id="{{ $empresa->id }}" />
        @if (count($clienteagendamento) > 0)
            <x-agendamentos_clientes :clienteagendamento="$clienteagendamento" empresa_nomeFantasia="{{ $empresa->nomeFantasia }}"
                empresa_id="{{ $empresa->id }}" />
        @else
            <div class="pt-2">
                <div class="alert alert-warning pt-2" role="alert">
                    Você ainda não tem atendimentos cancelados
                </div>
            </div>
        @endif
    </div>

    <x-pagination :paginatedItems="$clienteagendamento" />


@endsection
