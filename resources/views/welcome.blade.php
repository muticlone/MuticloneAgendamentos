@extends('Layout.main')
@section('logo', 'logo_home.png')
@section('title', 'Home')

@section('conteudo')

    <div class="row g-12">



        <div class="conteiner-search  col-8">
            <form action="/home/empresas" method="GET" id="searchForm">



                <select id="select-empresaHome" class="js-buscacategoria select2 form-select"
                    data-placeholder="Busque por uma empresa" style="width: 100%" name="search">
                    <option value="" disabled selected>Busque por uma empresa</option>
                    @foreach ($empresasOrdenadasPaginadas as $empresaBusca)
                        <option class="custom-option img-flag" value="{{ $empresaBusca['nomeFantasia'] }}"
                            data-img-src="/img/logo_empresas/{{ $empresaBusca['image'] }}">
                            {{ $empresaBusca['nomeFantasia'] }}</option>
                    @endforeach
                </select>


            </form>

        </div>


        <x-carousel />

        <x-alert-busca-home :count="$Cadastro_empresa" search="{{ $search }}" txt="Todos os empresas disponíveis"
            linktodos="home/empresas" />



    </div>




    <div class="row ">
        @foreach ($empresasOrdenadasPaginadas as $index => $empresa)
            <div class="col-lg-4">
                <a href="/empresas/dados/{{ $empresa['id'] }}" class="card-header">
                    <div class="novohomeempresa">
                        <div align="center">



                            <img src="/img/logo_empresas/{{ $empresa['image'] }}" class=" img_tela_home"
                                alt="{{ $empresa['razaoSocial'] }}">

                            @php
                                $empresaId = $empresa['id'];
                                $mediaNotas = isset($mediaNotasPorEmpresa[$empresaId]) ? $mediaNotasPorEmpresa[$empresaId] : 0;
                            @endphp

                            <div class="pt-1">
                                <input id="input-6" name="input-6" class="rating rating-loading pt-br"
                                    value="{{ $mediaNotas }}" data-min="0" data-max="5" data-step="0.1"
                                    data-readonly="true" data-show-clear="false" data-size="xs">
                            </div>
                        </div>


                        <h2 class="fw-normal text-center">{{ ucfirst($empresa['nomeFantasia']) }}</h2>
                        <p>{{ $empresa['descricao'] }}</p>

                    </div>

                </a>

                <a href="/empresas/dados/{{ $empresa['id'] }}" class="btn btn-sm btn-primary btg">Detalhes</a>

            </div>
        @endforeach
    </div>





    @if (count($empresasOrdenadasPaginadas) == 0 && $search)
        <div class="alert alert-warning pt-2" role="alert">
            Não foi possível encontrar nenhuma empresa ou serviço com: "{{ $search }}" <a href="/home/empresas">Ver
                todos</a>
        </div>
    @elseif(count($empresasOrdenadasPaginadas) == 0)
        <div class="alert alert-warning pt-2" role="alert">
            Não há empresas disponíveis
        </div>
    @endif



    <x-pagination :paginatedItems="$empresasOrdenadasPaginadas" />









    </div>


    <script src="/js/carrosel.js"></script>
    <script src="/js/select2.js"></script>

@endsection
