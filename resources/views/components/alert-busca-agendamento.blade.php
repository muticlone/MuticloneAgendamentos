@props(['search' => '' ,  ' href' => '', 'searchdate' =>'' ])

<div>
    @if ($searchdate)


    <div class="pt-1">
        <div class="alert alert-success" role="alert">
            Buscando por agendamentos na data: "{{ \Carbon\Carbon::parse($searchdate)->format('d/m/Y') }}" <a
            href="{{ $href }}">Ver
            todos</a>
        </div>
    </div>
@endif


    @if ($search)
                @if (is_numeric($search))
                    <div class="pt-1">
                        <div class="alert alert-success" role="alert">
                            Buscando pelo um número do pedido: "{{ $search }}" <a
                                href="{{ $href }}">Ver
                                todos</a>
                        </div>
                    </div>
                @else
                    <div class="pt-1">
                        <div class="alert alert-success" role="alert">
                            Buscando por:  "{{ $search }}" <a
                            href="{{ $href }}">Ver
                            todos</a>
                        </div>
                    </div>
                @endif
            @endif
</div>
