@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    {{-- <div class="col-3">
        <form action="/relatorio/produtos/{{ $dados['idempresa'] }}">

            <x-btn-relatorio nome="Relatório todos os produtos" />


        </form>
    </div> --}}


@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all"
        rel="stylesheet" type="text/css" />

    <div class="row g-12">
        <div class="col-lg-12 col-sm-12 col-md-12 pt-2 ">

            <div class="card card-widget widget-user">

                <div class="widget-user-header bg-info ">
                    <div class="star">
                        <input id="input-6" name="input-6" class="rating rating-loading pt-br "
                            value="{{ $dados['media'] }}" data-min="0" data-max="5" data-step="0.1" data-readonly="true"
                            data-show-clear="false" data-size="xs" style="margin: 0 auto; display: block;">
                    </div>
                </div>


                <div class="widget-user-image">
                    <img class="img-circle elevation-3 img-fluid" style="width: 110px; height: 110px;"
                        src="/img/logo_servicos/{{ $dados['image'] }}" alt="{{ ucfirst($dados['nomedoservico']) }}">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12  mx-2 ">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <h3 class="widget-user-username">{{ ucfirst($dados['nomedoservico']) }}</h3>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-12">
                        <div class="col-lg-4 col-sm-12 col-md-12 ">
                            <x-cardadminlte ico="far fa-star" tema="Usuários que favoritaram" info="{{ $dados['numeroDefavoritos'] }}" />
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 ">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-cardadminlte ico="far fa-star" tema="teste" info="teste" />
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-cardadminlte ico="far fa-star" tema="teste" info="teste" />

                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-12">
                        @if ($dados['numeroDeagendamentoComEsseProduto'] > 0)
                            <div class="col-lg-4 col-sm-12 col-md-12">
                                <div class="description-block">
                                    <span class="info-box-number">
                                        <x-small-user tema="{{ $dados['numeroDeagendamentoComEsseProduto'] }}"
                                            txt="Pedidos finalizados" icon='fas fa-shopping-cart'
                                            class="small-box-footer" />


                                    </span>
                                </div>
                            </div>
                        @endif
                        @if ($dados['numeroDeClientes'] > 0)
                            <div class="col-lg-4 col-sm-12 col-md-12">
                                <div class="description-block">
                                    <span class="info-box-number">
                                        <x-small-user tema="{{ $dados['numeroDeClientes'] }}"
                                            txt="Clientes para esse produto" icon='fas fa-shopping-cart'
                                            class="small-box-footer" />
                                    </span>

                                </div>



                            </div>

                            @if ($dados['nome'] > 0)
                                <div class="col-lg-4 col-sm-12 col-md-12">
                                    <div class="description-block">
                                        <span class="info-box-number">

                                            <x-small-user tema="{{ $dados['nome'] }}"
                                                txt="Frequência: {{ $dados['frequencia'] }}"
                                                icon='fas fa-shopping-cart' class="small-box-footer"
                                                btntxt="Cliente mais frequente"/>

                                        </span>

                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="row g-12">
                        @foreach ($dadosavaliacao as $dado)
                            <div class="col-lg-4 col-sm-12 col-md-12">
                                <div class="description-block">
                                    <span class="info-box-number">
                                        <div class="timeline">



                                            <div>
                                                <i class="fas fa-user bg-green"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="fas fa-clock"></i> {{ $dado['data'] }}</span>
                                                    <div class="d-flex pt-2 mx-2">
                                                        <div class="mr-auto">{{ $dado['nome'] }}</div>
                                                        <input id="input-6" name="input-6" class="rating rating-loading pt-br ml-2"
                                                            value="{{ $dado['nota'] }}" data-min="0" data-max="5" data-step="0.1"
                                                            data-readonly="true" data-show-clear="false" data-size="xs">
                                                    </div>



                                                </div>


                                            </div>

                                        </div>

                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>









    <x-pagination :paginatedItems="$avaliacao" />
















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
