@props(['status' => [] , 'searchdate' => ''])
<div>




    @if ($status['ativos'])
        <x-Alert texto="Você ainda não tem atendimentos ativos" />
    @endif

    @if ($status['pendentes'])
        <x-Alert texto="Você ainda não tem atendimentos pendetes" />
    @endif

    @if ($status['confirmados'])
        <x-Alert cor="info" texto="Você ainda não tem atendimentos confirmados" />
    @endif

    @if ($status['finalizados'])
        <x-Alert cor="success" texto="Você ainda não tem atendimentos finalizado" />
    @endif

    @if ($status['cancelados'])
        <x-Alert cor="danger" texto="Você ainda não tem atendimentos Cancelado" />
    @endif

    @if ($status['todos'])
        <x-Alert texto="Nenhum agendamento foi localizado durante esta pesquisa." />
    @endif

</div>
