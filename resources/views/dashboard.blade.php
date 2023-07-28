@extends('Layout.main')
@section('logo','logo_empresa.png')
@section('title','Dashboard')

@section('conteudo')

  @if(count($empresa)>0)
  <div class="table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Meus negócios</th>
        
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($empresa as $emp)
        <tr>
          <th scope="row">{{$loop->index+1}}</th>
          <td  class="tabelas"> 
              <div class="list-group">
                  <a   class="list-group-item list-group-item-action" href="/empresas/dados/{{$emp->id}}">{{$emp->nomeFantasia}}</a>
              </div>
          </td>
          <td>
           
              <a href="/dashboard/edit/{{$emp->id}}" 
                class="btn btn-sm btn-outline-warning btndashboard bt"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Edite o cadastro da empresa">
                Editar
              </a>
              <a href="/dados/servicos/{{$emp->id}}" class="btn btn-sm btn-outline-info btndashboard bt"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Veja seus serviços ">
                Meus serviços
              </a>
              <a href="/cadastro/servicos/{{$emp->id}}" 
                class="btn btn-sm btn-outline-success btndashboard bt"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Crie um novo serviço ">
                Novo serviço
              </a>
            
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  

  {{-- paginação --}}

    <div class="py-4 d-flex justify-content-center">
      <ul class="pagination">
          @if ($empresa->onFirstPage())
              <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
              </li>
          @else
              <li class="page-item">
                  <a class="page-link" href="{{ $empresa->previousPageUrl() }}">Anterior</a>
              </li>
          @endif
    
          @foreach ($empresa->getUrlRange(1, $empresa->lastPage()) as $page => $url)
              @if ($page == $empresa->currentPage())
                  <li class="page-item active" aria-current="page">
                      <span class="page-link">{{ $page }}</span>
                  </li>
              @else
                  <li class="page-item">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endif
          @endforeach
    
          @if ($empresa->hasMorePages())
              <li class="page-item">
                  <a class="page-link" href="{{ $empresa->nextPageUrl() }}">Próxima</a>
              </li>
          @else
              <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
              </li>
          @endif
      </ul>
    </div>
      
  

  @else
    <!-- Se não houver empresas, exiba alguma mensagem de aviso ou tratamento adequado -->
  @endif


  

    






@endsection