@extends('Layout.main')

@section('title',$empresa->razaoSocial)

@section('conteudo')

<div class="col-md-10 offset-md-1">

    <div class="row">
        <div id="image-container" class="col-md-6 pt-4">
            <img src="/img/logo_empresas/{{ $empresa->image}}" class="img-fluid" alt="{{$empresa->razaoSocial}}">
        </div>    
        <div id="info-container" class="col-md-6 pt-4">
            <h1>{{ $empresa->nomeFantasia}}</h1>
            
            <p>{{ $empresa->descricao}}</p>
            {{-- <p class="events-participantes"><ion-icon name="people-outline"></ion-icon>{{ count($empresa->users)}} Participantes</p> --}}
            {{-- <p class="events-owner pt-2"><ion-icon name="star-outline"></ion-icon>{{$eventOwner['name']}}</p> --}}
            {{-- <ion-icon name="location-outline"></ion-icon> --}}
           

          
            
           
        </div>
        <div class="clo-md-12" id="description-container pt-2" >
            <h3>Ramo:</h3>
            <p class="events-decription  ">{{ $empresa->area_atuacao}}</p>

        </div>
    </div>


</div>




@endsection