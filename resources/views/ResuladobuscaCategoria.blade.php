@extends('Layout.main')

@section('title','Categoria' )

@section('conteudo')

<div class="row g-12">

    <div class=" conteiner-search  col-8">
        <form action="/" method="GET" id="searchForm">

          <x-select-servico-home :servico="$servicos" />


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

    @foreach ($servicos as $index => $servicos)
    <div class="col-lg-3 col-sm-6 col-md-6 pt-2"> <!-- Defina o tamanho da coluna aqui, como col-6 para metade da largura -->
        <x-servicos-home servico_id="{{ $servicos->id }}"
        servico_imageservico="{{ $servicos->imageservico  }}"
        servico_nomeServico="{{ $servicos->nomeServico }}"
        servico_valorDoServico="{{ $servicos->valorDoServico }}"
        />
    </div>

        @if (($index + 1) % 10 == 0)
</div>
<div class="row g-12 pt-2">
    @endif
    @endforeach

</div>






<script src="/js/carrosel.js"></script>
<script src="/js/select2.js"></script>
@endsection
