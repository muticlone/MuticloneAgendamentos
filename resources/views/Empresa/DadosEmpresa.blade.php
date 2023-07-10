@extends('Layout.main')

@section('title',$empresa->razaoSocial)

@section('conteudo')

<div class="col-md-10 offset-md-1">

    <div class="row g-12">
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
           
            <img src="/img/logo_empresas/{{ $empresa->image}}" class="img-fluid  img_dados_empresa" alt="{{$empresa->razaoSocial}}">
             
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            
          
            <h3>{{ $empresa->nomeFantasia}}</h3>
            
                
            <p class="txt_dados_empresa">{{ $empresa->descricao}}</p>
        
            <h3>Ramo:</h3>
            <p class="txt_dados_empresa">{{ $empresa->area_atuacao}}</p>

        </div>
    </div>


</div>




@endsection