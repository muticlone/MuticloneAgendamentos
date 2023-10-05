<div>
    @props(['search' => '', 'count' => [], 'txt' => '', 'txt2' => '', 'link' => '', 'linktodos' => '',
     'tema' => true])

    @if (count($count) > 0)
        @if ($search)
            <div class="pt-1">
                <div class="alert alert-success" role="alert">
                    Buscando por : "{{ $search }}" <a href="/{{ $linktodos }}">Ver todos</a>
                </div>
            </div>
        @else
            @if ($tema === true)
                <div class="pt-1">
                    <div class="alert alert-light txtlink" role="alert" align="center">
                        {{ $txt }} <a href="{{ $link }}">{{ $txt2 }}</a>
                    </div>
                </div>
            @endif
        @endif
    @endif
</div>
