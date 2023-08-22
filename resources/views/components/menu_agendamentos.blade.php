@props(['empresa_id' => ''])

<div>
    <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
        <div class="btn-group" role="group" aria-label="Basic example">

            <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $empresa_id, 'status' => 'ativos']) }}" class="btn btn-sm btn-outline-warning btndashboardservico">Ativos</a>
            <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $empresa_id, 'status' => 'pendentes']) }}" class="btn btn-sm btn-outline-warning btndashboardservico">Pendentes</a>
            <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $empresa_id, 'status' => 'confirmados']) }}" class="btn btn-sm btn-outline-info btndashboardservico">Confirmados</a>
            <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $empresa_id, 'status' => 'finalizados']) }}" class="btn btn-sm btn-outline-success btndashboardservico">Finalizados</a>
            <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $empresa_id, 'status' => 'cancelados']) }}" class="btn btn-sm btn-outline-danger btndashboardservico">Cancelados</a>





        </div>
    </div>
</div>
