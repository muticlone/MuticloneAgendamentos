@extends('Layout.main')

@section('title','SERVIÇOS' )

@section('conteudo')

<div class="row g-12">
   
    <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center"> 
        <div class="btn-group" role="group" aria-label="Basic example">
            {{-- <a href="/" class="btn btn-sm btn-outline-info btndashboardservico">Home</a> --}}
            <a  href="/dashboard" class="btn btn-sm btn-outline-info btndashboardservico">Meu negócios</a>
          
           
            <a href="/cadastro/servicos/{{ $empresa->id}}" class="btn btn-sm btn-outline-info btndashboardservico">Novo serviço</a>
          
           
        </div>
    </div>
    <div class="col-lg-5 col-sm-12 col-md-12 pt-2">
        <form action="#" method="GET">
    
            <div class="input-group mb-3">
              <input type="search" class="form-control" id="search" name="search" placeholder="Busque o serviço pelo nome...">
              <button class="btn btn-outline-secondary custom-btn" type="submit">
                <ion-icon name="search-outline" class="iconCentralizar"></ion-icon>
                Buscar
              </button>
            </div>
          </form>
    </div>
   
</div>




@php
    $link = null;
    $link2 = 1;
@endphp

@foreach ($servicos as $se)
    @php
        $link = $se->cadastro_de_empresas_id;
        $link2 = $se->cadastro_de_empresas_id;
    @endphp
    
    @break
@endforeach

@if($search && $link !== null)
    <div class="alert alert-success" role="alert">
        Resultado da busca: "{{$search}}"
        <a href="/dados/servicos/{{ $link }}">
            Ver todos os Serviços 
        </a>
    </div>
   
@elseif($search && $link == null)

    <div class="alert alert-warning" role="alert">
        Buscando por: "{{$search}}" Nenhum resultado encontrado
        <a href="/dados/servicos/{{ $link2 }}">
            Ver todos os Serviços
           
        </a>
    </div>
    
@endif







<table class="table">
  <thead>
      <tr>
          <th scope="col"></th>
         
          @if(count( $servicos)>0)   
            <th scope="col">Seus Serviços</th>
        
          @else
             <th scope="col">Você ainda não serviços </th>
          @endif
         
          <th scope="col"></th>
      </tr>
  </thead>
  <tbody>
      @foreach ($servicos as $servico)
       
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td class="tabelas">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="/servicos/dados/{{$servico->id}}">
                        <img src="/img/logo_servicos/{{ $servico->imageservico}}" alt="{{ $servico->nomeServico }}" class="imgtabela">
                        {{ $servico->nomeServico }}
                    </a>
                   
                </div>
            </td>
            <td>

                <div class="btn-group" role="group" aria-label="Basic example ">
                    <form action="/apagar/servicos/{{$servico->id}}" method="POST">
                       
                
                        <a href="/edit/servicos/{{$servico->id}}" class="btn btn-sm btn-outline-warning btndashboardservico mr-3">
                            {{-- editar --}}
                            <x-svg-edit width="14" height="14" margin="3px"/>
                        </a>
                      
                    
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger btndashboardservico mr-3 ">
                               {{-- apagar --}}
                                <x-svg-deletar width="14" height="14" margin="3px"/>
                              
                            </button>
  
                    </form>
                    
                   
                </div>
            </td>
        </tr>
        {{----}}
    
    
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