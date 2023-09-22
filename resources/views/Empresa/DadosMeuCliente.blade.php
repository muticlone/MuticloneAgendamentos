@extends('adminlte::page')

@section('title', 'Meu Cliente')

@section('content_header')




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
        Celular: {{ $clientesBusca->phone }}<br>
        E-mail:{{ $clientesBusca->email }}

    </div>

    <div class="row g-12">
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3> {{ $numeroDoPedidos }}</h3>
                    <p>Todal de agendamentos finalizados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="/meus/agendamentos/empresa/{{ $idEmpresa }}/finalizados?search={{ $clientesBusca->name }}"
                    class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">



            <x-agendamentos-cancelados Porcentagemdepedidoscancelados="{{ $porcentagemDeCancelamento }} %"
            quantidadedepedidoscacenlados="{{ $numeroDeCanelados }}"
            link="/meus/agendamentos/empresa/{{ $idEmpresa }}/cancelados?search={{ $clientesBusca->name }}" />

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





    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

@stop
