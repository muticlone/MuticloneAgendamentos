@extends('Layout.main')
@section('logo', 'logo_home.png')
@section('title', 'Home')

@section('conteudo')

    <div class="row g-12">


        {{-- <div class=" conteiner-search  col-8">
            <form action="/home/empresas" method="GET">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Procurar...">
                    <button class="btn btn-outline-secondary custom-btn" type="submit">
                        <ion-icon name="search-outline" class="iconCentralizar"></ion-icon>
                        Buscar
                    </button>
                </div>
            </form>

        </div> --}}

        <div class=" conteiner-search  col-8">
            <form action="/home/empresas" method="GET" id="searchForm">




                <div class="input-group mb-3">




                    <select id="select-servicoHome" class="js-buscacategoria select2 form-select"
                    data-placeholder="Selecione um serviço" style="width: 100%" name="search">
                        <option value="" disabled selected>Selecione um serviço</option>
                        @foreach ($Cadastro_empresa as $empresaBusca)
                            <option class="custom-option img-flag" value="{{$empresaBusca->nomeFantasia }}" data-img-src="/img/logo_empresas/{{ $empresaBusca->image }}">{{ $empresaBusca->nomeFantasia }}</option>
                        @endforeach
                    </select>







                </div>
            </form>

        </div>


        <x-carousel/>
        @if (count($Cadastro_empresa) > 0)

            @if ($search)
                <div class="pt-1">
                    <div class="alert alert-success" role="alert">
                        Buscando por : "{{ $search }}" <a href="/home/empresas">Ver todos</a>
                    </div>
                </div>
            @else
                <div class="pt-1">
                    <div class="alert alert-light" role="alert" align="center">
                        Todos os empresas disponíveis
                    </div>


                </div>
            @endif
        @endif

    </div>




    <div class="row g-12 pt-2">
        @foreach ($Cadastro_empresa as $index => $empresa)
            <div class="col-auto pt-2">
                <div class="card cardlayout" >
                    <a href="/empresas/dados/{{ $empresa->id }}">
                        <img src="/img/logo_empresas/{{ $empresa->image }}" class=" img_tela_home" class="img-logo"
                            alt="{{ $empresa->razaoSocial }}">
                    </a>

                    <div class="image-and-rating">
                        <input id="input-6" name="input-6" class="rating rating-loading pt-br" value="3.5"
                            data-min="0" data-max="5" data-step="0.1" data-readonly="true" data-show-clear="false"
                            data-size="xs">
                    </div>
                    <div class="card-body txt">
                        <p class="card-text">{{ $empresa->nomeFantasia }}</p>
                        <p class="card-text">{{ $empresa->area_atuacao }}</p>

                        <a href="/empresas/dados/{{ $empresa->id }}" class="btn btn-sm btn-primary btg">Detalhes</a>
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
    <div class="pagination-container">
        <div class="py-4 d-flex justify-content-center">
            <ul class="pagination">
                {{-- <!-- Página Anterior --> --}}
                @if ($Cadastro_empresa->appends(['search' => $search])->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link"
                            href="{{ $Cadastro_empresa->appends(['search' => $search])->previousPageUrl() }}">Anterior</a>
                    </li>
                @endif

                {{-- <!-- Números de página --> --}}
                @for ($i = 1; $i <= $Cadastro_empresa->lastPage(); $i++)
                    @if ($i == $Cadastro_empresa->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link"
                                href="{{ $Cadastro_empresa->appends(['search' => $search])->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor

                {{-- <!-- Próxima Página --> --}}
                @if ($Cadastro_empresa->appends(['search' => $search])->hasMorePages())
                    <li class="page-item">
                        <a class="page-link"
                            href="{{ $Cadastro_empresa->appends(['search' => $search])->nextPageUrl() }}">Próxima</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Próxima</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>





    @if (count($Cadastro_empresa) == 0 && $search)
        <div class="alert alert-warning pt-2" role="alert">
            Não foi possível encontrar nenhuma empresa ou serviço com: "{{ $search }}" <a href="/home/empresas">Ver
                todos</a>
        </div>
    @elseif(count($Cadastro_empresa) == 0)
        <div class="alert alert-warning pt-2" role="alert">
            Não há eventos disponíveis
        </div>
    @endif









    </div>


    <script src="/js/carrosel.js"></script>
    <script src="/js/select2.js"></script>

@endsection
