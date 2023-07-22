@extends('Layout.main')

@section('title','SERVIÇOS' )

@section('conteudo')

<table class="table">
  <thead>
      <tr>
          <th scope="col"></th>
          <th scope="col">Seus Serviços</th>
          <th scope="col"></th>
      </tr>
  </thead>
  <tbody>
      @foreach ($servicos as $servico)
          <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              <td>
                  <div class="list-group">
                      <a class="list-group-item list-group-item-action" href="">{{ $servico->nomeServico }}</a>
                  </div>
              </td>
              <td>
                  <a href="#" class="btn btn-sm btn-outline-warning btndashboardservico">Editar</a>
                  <a href="#" class="btn btn-sm btn-outline-danger btndashboardservico">Apagar</a>
                  <a href="#" class="btn btn-sm btn-outline-info btndashboardservico">Criar um serviço</a>
              </td>
          </tr>
      @endforeach
  </tbody>
</table>


{{-- paginação --}}
<div class="py-4 d-flex justify-content-center">
  <ul class="pagination">
      @if ($servicos->onFirstPage())
          <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
          </li>
      @else
          <li class="page-item">
              <a class="page-link" href="{{ $servicos->previousPageUrl() }}">Anterior</a>
          </li>
      @endif

      @foreach ($servicos->getUrlRange(1, $servicos->lastPage()) as $page => $url)
          @if ($page == $servicos->currentPage())
              <li class="page-item active" aria-current="page">
                  <span class="page-link">{{ $page }}</span>
              </li>
          @else
              <li class="page-item">
                  <a class="page-link" href="{{ $url }}">{{ $page }}</a>
              </li>
          @endif
      @endforeach

      @if ($servicos->hasMorePages())
          <li class="page-item">
              <a class="page-link" href="{{ $servicos->nextPageUrl() }}">Próxima</a>
          </li>
      @else
          <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
          </li>
      @endif
  </ul>
</div>



@endsection