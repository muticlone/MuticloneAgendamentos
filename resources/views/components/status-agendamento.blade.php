@props(['agendamento_confirmado' => '', 'agendamento_finalizado' => '',
        'agendamento_cancelado' => ''

])

<div>

    @if ($agendamento_confirmado == 0 && $agendamento_cancelado == 0)
        <div class="inline-containerStatusAgendamento pt-2 ">
            <p class="card-text ">Status: </p>
            <p class="card-text text-warning mx-1">Aguardando confirmar</p>
        </div>
    @elseif ($agendamento_finalizado == 1 && $agendamento_cancelado == 0)
        <div class="inline-containerStatusAgendamento pt-2 ">
            <p class="card-text ">Status: </p>
            <p class="card-text text-success mx-1">Finalizado</p>
        </div>
    @elseif ($agendamento_confirmado == 1 && $agendamento_cancelado == 0)
        <div class="inline-containerStatusAgendamento pt-2 ">
            <p class="card-text ">Status: </p>
            <p class="card-text text-info mx-1">Confirmado</p>
        </div>
    @elseif ($agendamento_cancelado == 1)
        <div class="inline-containerStatusAgendamento pt-2 ">
            <p class="card-text ">Status: </p>
            <p class="card-text text-danger mx-1">Cancelado</p>
        </div>
    @endif


</div>
