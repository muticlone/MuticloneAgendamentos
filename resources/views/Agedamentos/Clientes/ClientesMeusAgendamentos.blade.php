@extends('Layout.main')

@section('title', 'Meus Agendamentos')

@section('conteudo')

    <x-meu_agendamentos-clientes />


    <div class="col-md-12 offset-md-0 pt-3">
        <div class="row g-12">

            @if (count($agendamentos) > 0)
                <x-meus_agendamentos_clientes :agendamentos="$agendamentos" :empresaAgendamento="$empresaAgendamento" />
            @else

                @if ($ativos)
                    <x-Alert texto="Você ainda não tem atendimentos ativos" />
                @elseif ($pendete)
                    <x-Alert texto="Você ainda não tem atendimentos pendetes" />
                @elseif ($confirmado)
                    <x-Alert cor="info" texto="Você ainda não tem atendimentos confirmados" />
                @elseif ($finalizado)
                    <x-Alert cor="success" texto="Você ainda não tem atendimentos finalizado" />
                @elseif ($cancelado)
                    <x-Alert cor="danger" texto="Você ainda não tem atendimentos Cancelado" />
                @endif

            @endif

        </div>

        <x-pagination :paginatedItems="$agendamentos" />
    </div>


@endsection
