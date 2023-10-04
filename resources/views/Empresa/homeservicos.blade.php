@extends('Layout.main')

@section('title', 'Serviços')

@section('conteudo')

    <div class="row g-12">

        <div class=" conteiner-search  col-8">
            <form action="/" method="GET" id="searchForm">

                {{-- <x-select-servico-home :servico="$servicoBusca" /> --}}

                <div class="input-group mb-3">
                    <input type="search" class="form-control" id="search" name="search" placeholder="Procurar...">
                    <button class="btn btn-outline-secondary custom-btn" type="submit">
                        <ion-icon name="search-outline" class="iconCentralizar"></ion-icon>
                        Buscar
                    </button>
                </div>


            </form>

        </div>


        <x-carousel />

        <x-alert-busca-home :count="$servico" search="{{ $search }}" txt="Todos os serviços disponíveis"
            txt2="Link para Categorias" link="{{ route('home.sevico.categorias') }}" />


    </div>


    <div class="row">
        @foreach ($servico as $index => $servicos)
            <div class="col-lg-4 col-sm-6 col-md-6">
                <x-servicos-home servico_id="{{ $servicos->id }}" servico_imageservico="{{ $servicos->imageservico }}"
                    servico_nomeServico="{{ $servicos->nomeServico }}"
                    servico_valorDoServico="{{ $servicos->valorDoServico }}"
                    descricaoservico="{{ $servicos->descricaosevico }}" media="3.5" />
            </div>
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








    <script src="/js/mascara.js"></script>

    <script src="/js/carrosel.js"></script>
    <script src="/js/select2.js"></script>
@endsection
