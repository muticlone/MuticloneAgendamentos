@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all"
        rel="stylesheet" type="text/css" />

    <div class="row g-12">
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">



            <div class="info-box mb-3 cards">
                <img src="/img/logo_servicos/{{ $dados['image'] }}" class="img-fluid  img_dashboardbusiness" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">{{ $dados['nomedoservico'] }}</span>
                    <span class="info-box-number">
                        <input id="input-6" name="input-6" class="rating rating-loading pt-br"
                            value="{{ $dados['media'] }}" data-min="0" data-max="5" data-step="0.1" data-readonly="true"
                            data-show-clear="false" data-size="xs">

                    </span>
                </div>

            </div>
        </div>
    </div>
    <div class="row g-12">
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{ $dados['numeroDeagendamentoComEsseProduto'] }}" txt="Quantidade de agendamentos"
                icon='fas fa-shopping-cart' class="small-box-footer" />


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






    <script src="{{ asset('/js/mascara.js') }}"></script>




    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

@stop
