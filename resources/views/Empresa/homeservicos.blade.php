@extends('Layout.main')

@section('title', 'Serviços')

@section('conteudo')

    <div class="row g-12">

        <div class=" conteiner-search  col-8">
            <form action="/" method="GET" id="searchForm">


                <x-select-servico-home :servico="$servico" />


            </form>

        </div>


        <x-carousel />

        @if (count($servico) > 0)

            @if ($search)
                <div class="pt-1">
                    <div class="alert alert-success" role="alert">
                        Buscando por : "{{ $search }}" <a href="/">Ver todos</a>
                    </div>
                </div>
            @else
                <div class="pt-1">

                    <div class="alert alert-light" role="alert" align="center">
                        Todos os serviços disponíveis <a href="{{ route('home.sevico.categorias') }}">Link para
                            Categorias</a>

                    </div>


                </div>
            @endif

        @endif
    </div>






    <div class="row g-12 pt-2">

        @foreach ($servico as $index => $servico)
            <div class="col-auto pt-2">
                <div class="card cardlayout ">

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




    {{-- paginação --}}

    <x-pagination :paginatedItems="$paginatedItems" />







    @if ($servico->count() === 0 && $search)
        <div class="alert alert-warning pt-2" role="alert">
            Não foi possível encontrar nenhuma serviço com: "{{ $search }}" <a href="/">Ver todos</a>
        </div>
    @elseif($servico->count() === 0)
        <div class="alert alert-warning pt-2" role="alert">
            Não há eventos disponíveis
        </div>
    @endif










    <script src="/js/carrosel.js"></script>
    <script src="/js/select2.js"></script>
@endsection
