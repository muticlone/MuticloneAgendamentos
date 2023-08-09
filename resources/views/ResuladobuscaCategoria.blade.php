@extends('Layout.main')

@section('title','Categoria' )

@section('conteudo')

<div class="row g-12">
        
    <div class=" conteiner-searchCategoria  col-8">
        <form action="/" method="GET" id="searchForm">
            


            
            <div class="input-group mb-3">
               
              
                {{-- <input type="text" list="suggestions" class="form-control" id="search" name="search" autocomplete="off" placeholder="Procurar..."> --}}

                {{-- <button class="btn btn-outline-secondary custom-btn " type="submit">
                    <ion-icon name="search-outline" class="iconCentralizar"></ion-icon>
                    Buscar
                </button> --}}

                <select id="select-servicoCategoria" class="js-buscacategoria select2 form-select" 
                data-placeholder="Selecione um serviço" style="width: 100%" name="search">
                    <option value="" disabled selected>Selecione um serviço</option>
                    @foreach ($servicos as $servicobusca)
                        <option class="custom-option img-flag" value="{{ $servicobusca->nomeServico }}" data-img-src="/img/logo_servicos/{{ $servicobusca->imageservico }}">{{ $servicobusca->nomeServico }}</option>
                    @endforeach
                </select>

                

               


            </div>
        </form>

    </div>


    <x-carousel/>
    
    <div class="col-12  pt-2 "> 
        <div class="alert alert-light" role="alert" align="center">
            Todos os serviços disponíveis na categorias {{ $nomeDaCategoria}}</a>
        
        </div>
    </div>
    
   
</div>



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


<div class="py-4 d-flex justify-content-center">
    <ul class="pagination">
        @if ($servicos->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $servicos->appends(['categoria' => $nomeDaCategoria, 'page' => $servicos->currentPage() - 1])->url($servicos->currentPage() - 1) }}">Anterior</a>
            </li>
        @endif

        @foreach ($servicos->getUrlRange(1, $servicos->lastPage()) as $page => $url)
            @if ($page == $servicos->currentPage())
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        @if ($servicos->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $servicos->appends(['categoria' => $nomeDaCategoria, 'page' => $servicos->currentPage() + 1])->url($servicos->currentPage() + 1) }}">Próxima</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
            </li>
        @endif
    </ul>
</div>

<script src="/js/carrosel.js"></script>
<script src="/js/select2.js"></script>
@endsection