@extends('Layout.main')

@section('title','Categoria' )

@section('conteudo')


<div class="row g-12 pt-2">

    @foreach ($servicos as $index => $servico)
        <div class="col-auto pt-2">
            <div class="card" style="width: 12rem ;">

                <img src="/img/logo_servicos/{{ $servico->imageservico }}" class=" img_tela_home" class="img-logo"
                    alt="{{ $servico->nomeServico }}">


                <div class="image-and-rating">


                    <input id="input6" name="input-6" class="rating rating-loading pt-br" value="5"
                        data-min="0" data-max="5" data-step="0.1" data-readonly="true" data-show-clear="false"
                        data-size="xs">


                </div>







                <div class="card-body txt">
                    <p class="card-text">{{ $servico->nomeServico }}</p>

                    {{-- <p class="card-text paragrafo-limitado " id="meu-paragrafo">{{($servico->descricaosevico)}}</p>  --}}

                    <a href="/servicos/dados/{{ $servico->id }}" class="btn btn-sm btn-primary btg">


                        Agendar



                    </a>

                </div>
            </div>
        </div>

        @if (($index + 1) % 10 == 0)
</div>
<div class="row g-12 pt-2">
    @endif
    @endforeach

</div>


@endsection