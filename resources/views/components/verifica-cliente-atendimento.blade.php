@props(['ativos' => '', 'pendete' => '','confirmado'=>'' ,'finalizado',
    'cancelado' => ''
])
<div>
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
</div>
