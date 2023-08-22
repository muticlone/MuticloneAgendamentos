@extends('Layout.main')

@section('title', 'Meus Agendamentos')

@section('conteudo')

<x-meu_agendamentos-clientes />


    <div class="col-md-12 offset-md-0 pt-3">
        <div class="row g-12">



            @if (count($agendamentos) > 0)
                <x-meus_agendamentos_clientes :agendamentos="$agendamentos" :empresaAgendamento="$empresaAgendamento"

                />
            @else
                <div class="pt-2">
                    <div class="alert alert-warning pt-2" role="alert">
                        Você ainda não tem atendimentos a serem confirmados
                    </div>
                </div>
            @endif


            <x-pagination :paginatedItems="$agendamentos" />


        </div>


    </div>


@endsection
