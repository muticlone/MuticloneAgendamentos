@props(['paginatedItems' => null])

<div class="py-4 d-flex justify-content-center">
    <ul class="pagination">
        @if ($paginatedItems->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginatedItems->previousPageUrl() }}">Anterior</a>
            </li>
        @endif

        @foreach ($paginatedItems->getUrlRange(1, $paginatedItems->lastPage()) as $page => $url)
            @if ($page == $paginatedItems->currentPage())
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        @if ($paginatedItems->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginatedItems->nextPageUrl() }}">Próxima</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
            </li>
        @endif
    </ul>
</div>
