@extends('Layout.main')
@section('logo','logo_empresa.png')
@section('title','Dashboard')

@section('conteudo')
  
<form action="/edit/servicos/{{$servico->id}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    @csrf
    @method('PUT')
    {{-- editar serviços --}}
    <x-cadastro-de-servico 
    img="/img/logo_servicos/{{$servico->imageservico}}"
    altimg="{{$empresa->nomeFantasia}}"   
    titulo="Editar serviço: "
    tituloNome="{{$servico->nomeServico}}"
    label_img="Adicionar uma nova imagem para o serviço:"
    valueNome="{{$servico->nomeServico}}"
    ValuevalorDoservico="{{$servico->valorDoServico}}"
    valueHorarioIncio="{{$servico->horario_incial_atedimento}}"
    valueHorariofinal="{{$servico->horario_final_atedimento}}"
    selectValuePadrao="{{$servico->duracaohoras}}"
    selectValuePadrao2="{{$servico->duracaominutos}}"
    descricao="{{$servico->descricaosevico}}"
    />
</form>

    
   
   
   


   

@endsection