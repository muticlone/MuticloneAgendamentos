<div>


    <div class="row g-12">


        <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
            <div class="btn-group" role="group" aria-label="Basic example">

                <a href="{{ route('clientes.agendamentos') }}"
                    class="btn btn-sm btn-outline-warning btndashboardservico">Ativos</a>
                <a href="{{ route('show_Aguardando_Confirmacao_Clientes') }}"
                    class="btn btn-sm btn-outline-warning btndashboardservico"> Pendente</a>
                <a href="{{ route('show_Agendamentos_Confirmados_Clientes') }}"
                    class="btn btn-sm btn-outline-info btndashboardservico">Confirmados</a>

                <a href="{{ route('show_agendamento_finalizados_Clientes') }}"
                    class="btn btn-sm btn-outline-success btndashboardservico">Finalizados</a>
                <a href="{{ route('show_Agendamento_Cancelados_Clientes') }}"
                    class="btn btn-sm btn-outline-danger btndashboardservico">Cancelados</a>
                {{-- <a href="" class="btn btn-sm btn-outline-warning btndashboardservico">Sem avaliação</a> --}}



            </div>
        </div>
    </div>
</div>
