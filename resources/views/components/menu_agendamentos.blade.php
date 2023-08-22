@props(['empresa_id' => ''])

<div>
    <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
        <div class="btn-group" role="group" aria-label="Basic example">

            <a href="{{ route('meus.clientes.agendamentosdetalhesempresa',['id' => $empresa_id]) }}" class="btn btn-sm btn-outline-warning btndashboardservico">Ativos</a>
            <a href="{{ route('meus.agendamentos.aguardandoconfirmacao',['id' => $empresa_id]) }}" class="btn btn-sm btn-outline-warning btndashboardservico">Pendentes</a>
            <a href="{{ route('meus.agendamentos.confirmados',['id' => $empresa_id]) }}" class="btn btn-sm btn-outline-info btndashboardservico">Confirmados</a>

            <a href="{{ route('meus.agendamentos.finalizados', ['id' => $empresa_id]) }}" class="btn btn-sm btn-outline-success btndashboardservico">Finalizados</a>
            <a href="{{ route('meus.agendamentos.cancelados', ['id' => $empresa_id]) }}" class="btn btn-sm btn-outline-danger btndashboardservico">Cancelados</a>




        </div>
    </div>
</div>
