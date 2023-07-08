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
  <div class="col-lg-3 col-sm-12 col-md-12 pt-2">
    <div class="card" style="width: 12rem;">
      <img src="img/mcdonalds-logo.png " class="card-img-top pt-1" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

  
  
  
  
</div>




@endsection