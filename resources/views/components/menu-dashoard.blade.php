@props(['empresa_id' => '','cor'=> 'info'])

<div>

    <div class="card card-{{ $cor }} collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Menu </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <div class="col-12 pt-2" align="center">

                <a href="/dashboard" class="btn btn-sm btn-outline-info btndashboardservico">

                    <x-svg-business width="14" height="14" margin="3px" nome="Négocios" />

                </a>


                <a href="{{ route('dados.meus.clientes', ['id' => $empresa_id, 'status' => 'ativos']) }}"
                    class="btn btn-sm btn-outline-info btndashboardservico">

                    <x-svg-meus-clientes nome="Clientes" width="14" height="14" margin="3px" />

                </a>

                <a href="/dados/servicos/{{ $empresa_id }}"
                    class="btn btn-sm btn-outline-warning btndashboardservico">


                    <x-svg-meusservicos  nome="Serviços" width="14" height="14" margin="3px" />
                </a>



                <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $empresa_id, 'status' => 'ativos']) }}"
                    class="btn btn-sm btn-outline-warning btndashboardservico">


                    <x-svg-meus-agendamentos nome="Pedidos" width="14" height="14" margin="3px" />
                </a>



                <a href="{{ route('agenda.business', ['id' => $empresa_id]) }}"
                    class="btn btn-sm btn-outline-info btndashboardservico">

                    <x-svgCalendardatefill nome="Agendas" width="14" height="14" margin="3px" />
                </a>
                <a href="{{ route('dashboard.business', ['id' => $empresa_id]) }}"
                    class="btn btn-sm btn-outline-info btndashboardservico">

                    <x-svg-dashboard width="14" height="14" margin="3px" />

                </a>










            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('[data-card-widget="collapse"]').click();
        });
    </script>




</div>
