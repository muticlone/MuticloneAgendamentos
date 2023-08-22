@props(['cor' => 'info' , 'id' => ''  , 'nome' =>'Detalhes'])

<div>
    <a href="{{ route('show_Agendamentos_Detalhes_Clientes', ['id' => $id]) }}"
        class="btn btn-{{ $cor }} position-relative btn_agendamentos_clientes">
        {{ $nome }}
        <span
            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            5
        </span>
    </a>
</div>
