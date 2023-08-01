@extends('Layout.main')
@section('logo','logo_home.png')
@section('title','Home')

@section('conteudo')

<div class="row g-12">


  <div class=" conteiner-search  col-8">
    <form action="/home/empresas" method="GET">
    
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="search" name="search" placeholder="Procurar...">
        <button class="btn btn-outline-secondary custom-btn" type="submit">
          <ion-icon name="search-outline" class="iconCentralizar"></ion-icon>
          Buscar
        </button>
      </div>
    </form>
    
  </div>


  <div id="carouselExampleDark" class="carousel carousel-dark slide foto " data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 6"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 7"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8" aria-label="Slide 8"></button>
      
      
      
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/barbearia.png" class="d-block w-100 " alt="...">
            
              
          </div>
        
          
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p> --}}
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/saoBeleza.png" class="d-block w-100" alt="...">
              
          </div>
          
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p> --}}
          </div>
        </div>

        
        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/tatuagem.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>
       
        

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/ateliedecostura.png" class="d-block w-100" alt="...">
            
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/restaurante.png" class="d-block w-100" alt="...">
            
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/mecanico.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/serviçosgereais.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="/img/advogado.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>



       

        
        
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>
  @if(count($Cadastro_empresa)>0)

    @if($search)
      
      <div class="pt-1">
        <div class="alert alert-success" role="alert"> 
          Buscando por : "{{$search}}"  <a href="/home/empresas">Ver todos</a>
        </div>
      </div> 
    
    @else

      <div class="pt-1">
        <div class="alert alert-light" role="alert" align = "center"> 
          Todos os empresas disponíveis
        </div>
    
      
      </div>

    @endif
  @endif
 
</div>  




<div class="row g-12 pt-2">
  @foreach ($Cadastro_empresa as $index => $empresa)
   
    <div class="col-auto">
      <div class="card" style="width: 12rem ;">
        <a href="/empresas/dados/{{$empresa->id}}">
          <img src="/img/logo_empresas/{{$empresa->image}}" class=" img_tela_home" class="img-logo" alt="{{($empresa->razaoSocial)}}">
        </a>
        
        <div class="image-and-rating"> 
          <input id="input-6" name="input-6" 
          class="rating rating-loading pt-br" value="3.5" data-min="0" data-max="5" data-step="0.1"
          data-readonly="true" data-show-clear="false" data-size="xs">
        </div>
        <div class="card-body txt">
          <p class="card-text">{{($empresa->nomeFantasia)}}</p> 
          <p class="card-text">{{($empresa->area_atuacao)}}</p> 
         
          <a href="/empresas/dados/{{$empresa->id}}" class="btn btn-sm btn-primary btg">Detalhes</a>
        </div>
      </div>
    </div>

    @if (($index + 1) % 8 == 0)
      </div>
      <div class="row g-12 pt-2">
    @endif

  @endforeach
 
</div>

{{-- paginação --}}
<div class="pagination-container"> 
  <div class="py-4 d-flex justify-content-center">
    <ul class="pagination">
        {{-- <!-- Página Anterior --> --}}
        @if ($Cadastro_empresa->appends(['search' => $search])->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $Cadastro_empresa->appends(['search' => $search])->previousPageUrl() }}">Anterior</a>
            </li>
        @endif
  
        {{-- <!-- Números de página --> --}}
        @for ($i = 1; $i <= $Cadastro_empresa->lastPage(); $i++)
            @if ($i == $Cadastro_empresa->currentPage())
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $i }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $Cadastro_empresa->appends(['search' => $search])->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
  
        {{-- <!-- Próxima Página --> --}}
        @if ($Cadastro_empresa->appends(['search' => $search])->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $Cadastro_empresa->appends(['search' => $search])->nextPageUrl() }}">Próxima</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
            </li>
        @endif
    </ul>
  </div>
</div>





  @if(count($Cadastro_empresa)==0 && $search) 
    <div class="alert alert-warning pt-2" role="alert">
      Não foi possível encontrar nenhuma empresa ou serviço com: "{{$search}}" <a href="/home/empresas">Ver todos</a>
    </div>
  @elseif(count($Cadastro_empresa)==0)
    <div class="alert alert-warning pt-2" role="alert">
      Não há eventos disponíveis
    </div>
  @endif

    



  
  
  
  
</div>




@endsection