<div>
    @props(['empresa_id'=> ''])

    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('dados.meus.clientes', ['id' => $empresa_id, 'status' => 'ativos']) }}"
            class="btn btn-sm btn-outline-info btndashboard">Ativos</a>
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('dados.meus.clientes', ['id' => $empresa_id, 'status' => 'clientesnaoatendido']) }}"
            class="btn btn-sm btn-outline-info btndashboard">Clientes não atendidos</a>
    </div>

    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('dados.meu.cliente.ranks', ['idempresa' => $empresa_id]) }}"
            class="btn btn-sm btn-outline-info btndashboard">Ranking</a>
    </div>

</div>
