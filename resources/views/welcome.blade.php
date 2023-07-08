@extends('Layout.main')

@section('title','Home')

@section('conteudo')

<div class="row g-12">


  <div class=" conteiner-search  col-8">
    <input type="text" class="form-control" id="search" name="search" placeholder="Procurar...">
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
              <img src="img/barbearia.png" class="d-block w-100 " alt="...">
            
              
          </div>
        
          
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p> --}}
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/saoBeleza.png" class="d-block w-100" alt="...">
              
          </div>
          
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p> --}}
          </div>
        </div>

        
        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/tatuagem.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>
       
        

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/ateliedecostura.png" class="d-block w-100" alt="...">
            
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/restaurante.png" class="d-block w-100" alt="...">
            
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/mecanico.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/serviçosgereais.png" class="d-block w-100" alt="...">
              
          </div>
        
          <div class="carousel-caption d-none d-md-block">
            {{-- <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p> --}}
          </div>
        </div>

        <div class="carousel-item" data-bs-interval="8000">
          <div class="conteiner.img">
              <img src="img/advogado.png" class="d-block w-100" alt="...">
              
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

 
</div>  


<div class="row g-12 pt-2">
  @foreach ($Cadastro_empresa as $index => $empresa)
    <div class="col-lg-2 col-sm-6 col-md-6 pt-2">
      <div class="card" style="width: 10rem ;">
        <img src="img/logo_empresas/{{$empresa->image}} " class="img-thumbnail" class="img-logo"  alt="{{($empresa->razaoSocial)}}">
        <div class="card-body txt">
          <p class="card-text">{{($empresa->nomeFantasia)}}</p> 
          {{-- <p class="card-title">{{mb_substr($empresa->razaoSocial, 0, 24) . (mb_strlen($empresa->razaoSocial) > 24 ? '...' : '') }}</p> --}}
          <p class="card-text">{{($empresa->area_atuacao)}}</p> 
          
          <a href="#" class="btn  btn-sm btn-primary btg">Saber mais +</a>
        </div>
      </div>
    </div>

    @if (($index + 1) % 4 == 0)
      </div>
      <div class="row g-12 pt-2">
    @endif

  @endforeach
</div>

    



  
  
  
  
</div>




@endsection