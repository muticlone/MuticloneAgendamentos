@extends('Layout.main')
@section('logo', 'logo_empresa.png')
@section('title', 'Dashboard')

@section('conteudo')



    {{-- linkpx="{{ $linkpx}}"
    linkAnterior="{{$linkAnterior}}" --}}


    <form action="/edit/servicos/{{ $servico->id }}" method="POST" enctype="multipart/form-data"
        class="row g-3 needs-validation" novalidate>
        @csrf
        @method('PUT')
        {{-- editar serviços --}}

        <x-cadastro-de-servico img="/img/logo_servicos/{{ $servico->imageservico }}" altimg="{{ $empresa->nomeFantasia }}"
            titulo="Editar serviço: " tituloNome="{{ $servico->nomeServico }}"
            label_img="Adicionar uma nova imagem para o serviço:" valueNome="{{ $servico->nomeServico }}"
            ValuevalorDoservico="{{ $servico->valorDoServico }}"
            valueHorarioIncio="{{ $servico->horario_incial_atedimento }}"
            valueHorariofinal="{{ $servico->horario_final_atedimento }}" selectValuePadrao="{{ $servico->duracaohoras }}"
            selectValuePadrao2="{{ $servico->duracaominutos }}" descricao="{{ $servico->descricaosevico }}" />



    </form>


    {{-- @foreach ($registrosPaginados as $registro)
    <x-cadastro-de-servico 
   
    img="/img/logo_servicos/{{$registro->imageservico}}"
    altimg="{{$empresa->nomeFantasia}}"   
    titulo="Editar serviço: "
    tituloNome="{{$registro->nomeServico}}"
    label_img="Adicionar uma nova imagem para o serviço:"
    valueNome="{{$registro->nomeServico}}"
    ValuevalorDoservico="{{$registro->valorDoServico}}"
    valueHorarioIncio="{{$registro->horario_incial_atedimento}}"
    valueHorariofinal="{{$registro->horario_final_atedimento}}"
    selectValuePadrao="{{$registro->duracaohoras}}"
    selectValuePadrao2="{{$registro->duracaominutos}}"
    descricao="{{$registro->descricaosevico}}"
    />
    
    
    @endforeach --}}
    {{-- paginação --}}
    {{-- <div class="pagination-container">
        <div class="py-4 d-flex justify-content-center">
          <ul class="pagination">
           
            @if ($registrosPaginados->onFirstPage())
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
              </li>
            @else
              <li class="page-item">
                <a class="page-link" href="{{ $registrosPaginados->previousPageUrl() }}">Anterior</a>
              </li>
            @endif
      
            @for ($i = 1; $i <= $registrosPaginados->lastPage(); $i++)
              @if ($i == $registrosPaginados->currentPage())
                <li class="page-item active" aria-current="page">
                  <span class="page-link">{{ $i }}</span>
                </li>
              @else
                <li class="page-item">
                  <a class="page-link" href="{{ $registrosPaginados->url($i) }}">{{ $i }}</a>
                </li>
              @endif
            @endfor
      
          
            @if ($registrosPaginados->hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{{ $registrosPaginados->nextPageUrl() }}">Próxima</a>
              </li>
            @else
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
              </li>
            @endif
          </ul>
        </div>
    </div> --}}











@endsection
