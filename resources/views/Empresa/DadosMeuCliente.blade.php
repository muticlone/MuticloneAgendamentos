@extends('adminlte::page')

@section('title', 'Meu Cliente')

@section('content_header')


<x-menu-dashoard empresa_id="{{ $idEmpresa  }}" />


@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all"
        rel="stylesheet" type="text/css" />

    <div class="col-sm-4 invoice-col pt-3  ">


        <strong>Nome: {{ ucfirst(strtolower($clientesBusca->name)) }}


        </strong><br>
        Celular: {{ $clientesBusca->phone }}
        <br>


        <form action="/relatorio/meu/cliente/{{  encrypt($clientesBusca->id)  }}/{{ encrypt( $idEmpresa )}}">

            <button type="submit" class="btn btn-info " >

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                  </svg>
                  Relatório
            </button>
        </form>


    </div>

    <div class="row g-12">
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{  $dataprimeiroagendamento }}" txt="Cliente desde"
            link="#"
            icon='fa fa-calendar'
            />

        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{  $datadoultimoagendamento }}" txt="Último agendamento"
            link="#"
            icon='fa fa-calendar'
            />

        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
            <x-small-user tema="R$ {{ $totalgasto }}" txt="Total de valor gasto" icon='fas fa-user-plus'
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/finalizados?search={{ $clientesBusca->name }}" />
           </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{ $numeroDoPedidos }}" txt="Pedidos finalizados"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/finalizados?search={{ $clientesBusca->name }}"
            icon='fas fa-user-plus'
            />

        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{ $numeroDeconfirmados }}" txt="Pedidos cofirmados"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/confirmados?search={{ $clientesBusca->name }}"
            icon='fas fa-user-plus'
            />

        </div>



        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{$numeroDenaoconfirmados  }} " txt="Pedidos aguardando confirmar"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/pendentes?search={{ $clientesBusca->name }}"
            icon='fas fa-user-plus'
            />

        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">


            <x-small-user tema="{{ $numeroDeCanelados }}" txt="Pedidos Cancelados {{ $porcentagemDeCancelamento }} %"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/cancelados?search={{ $clientesBusca->name }}"
            icon='fa fa-times'
            />



        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">


            <x-small-user tema="{{ $totalDepedidos }}" txt="Total de pedidos"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/cancelados?search={{ $clientesBusca->name }}"
            icon='fas fa-user-plus'
            />



        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">


            <x-small-user tema="{{ $posicao }}" txt="Posição no ranking cliente mais frequentes"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/cancelados?search={{ $clientesBusca->name }}"
            icon='fas fa-star'
            />



        </div>






        {{-- <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{  $numeroDenaoavaliados }}" txt="Agendamentos não avaliado pelo cliente"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/finalizados?search={{ $clientesBusca->name }}"
            icon='fas fa-user-plus'
            />

        </div> --}}









    </div>

    <div class="row g-12">

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <x-graficoPizza tema="Formas de pagamento"  />
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <x-grafico-donut tema="Produtos mais agendados" idgrafico="donutChart" />
        </div>


    </div>












@stop

@section('css')

    <link href="/css/StylesDashboard.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.1.0/chroma.min.js"></script>

    <!-- Load Bootstrap Star Rating JS -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js"
        type="text/javascript"></script>
    <!-- Load Portuguese language file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/pt-BR.js"></script>

    <script>
        var formasContagem = @json(  $formaPagamentoContagemTotal );
        var ProdutosContagem = @json($produtosTotal);

    </script>

    <script src="{{ asset('/js/graficopizza.js') }}"></script>
    <script src="{{ asset('/js/GraficoDounut.js') }}"></script>





    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

@stop
