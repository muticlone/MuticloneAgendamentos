@extends('Layout.main')
@section('logo', 'logo_empresa.png')
@section('title', 'Dashboard')

@section('conteudo')



    {{-- linkpx="{{ $linkpx}}"
    linkAnterior="{{$linkAnterior}}" --}}


    <form action="/edit/servicos/{{  encrypt( $servico->id) }}" method="POST" enctype="multipart/form-data"
        class="row g-3 needs-validation" novalidate>
        @csrf
        @method('PUT')
        {{-- editar serviços --}}
        <div class="col-md-8 offset-md-2">
          <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">


            <img src="/img/logo_servicos/{{ $servico->imageservico }}" name="imageservico" class="img-fluid  img_edit"
                alt="{{ $empresa->nomeFantasia }}">

        </div>
        <div class="pt-2">
            <div class="alert alert-light" role="alert" align="center">
              Editar serviço: {{ strtolower($servico->nomeServico) }}
            </div>
        </div>
        </div>

        <x-cadastro-de-servico
            label_img="Adicionar uma nova imagem para o serviço:" valueNome="{{ $servico->nomeServico }}"
            ValuevalorDoservico="{{ $servico->valorDoServico }}"
            valueHorarioIncio="{{ $servico->horario_incial_atedimento }}"
            valueHorariofinal="{{ $servico->horario_final_atedimento }}" selectValuePadrao="{{ $servico->duracaohoras }}"
            selectValuePadrao2="{{ $servico->duracaominutos }}" descricao="{{ $servico->descricaosevico }}" />

        <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
            <button type="submit" class="btn btn-info">Atualizar</button>
        </div>

    </form>














@endsection
