<div>


    <div class="row g-12">


        <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
            <div class="btn-group" role="group" aria-label="Basic example">

                <a href="{{ route('clientes.agendamentos', ['status' => 'ativos']) }}"
                    class="btn btn-sm btn-outline-warning btndashboardservico">Ativos</a>
                <a href="{{ route('clientes.agendamentos', ['status' => 'pendentes']) }}"
                    class="btn btn-sm btn-outline-warning btndashboardservico">Pendentes</a>
                <a href="{{ route('clientes.agendamentos', ['status' => 'confirmados']) }}"
                    class="btn btn-sm btn-outline-info btndashboardservico">Confirmados</a>
                <a href="{{ route('clientes.agendamentos', ['status' => 'finalizados']) }}"
                    class="btn btn-sm btn-outline-success btndashboardservico">Finalizados</a>
                <a href="{{ route('clientes.agendamentos', ['status' => 'cancelados']) }}"
                    class="btn btn-sm btn-outline-danger btndashboardservico">Cancelados</a>



            </div>
        </div>
    </div>
</div>
