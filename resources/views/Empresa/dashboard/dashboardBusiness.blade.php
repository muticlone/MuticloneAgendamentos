@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


<x-menu-dashoard empresa_id="{{ $idempresa }}" />

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
                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_dashboardbusiness"
                    alt="{{ $empresa->razaoSocial }}">
                <div class="info-box-content">
                    <span class="info-box-text">{{ $empresa->nomeFantasia }}</span>
                    <span class="info-box-number">
                        <input id="input-6" name="input-6" class="rating rating-loading pt-br" value="{{ $media }}"
                            data-min="0" data-max="5" data-step="0.1" data-readonly="true" data-show-clear="false"
                            data-size="xs">

                    </span>
                </div>

            </div>




        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
            <div class="info-box mb-3 cards">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Novos Clientes no mês atual</font>
                        </font>
                    </span>
                    <span class="info-box-number">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">2.000</font>
                        </font>
                    </span>
                </div>

            </div>

        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
            <div class="info-box cards">
                <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>
                <div class="info-box-content ">
                    <span class="info-box-text">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Favoritos</font>
                        </font>
                    </span>
                    <span class="info-box-number">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">410</font>
                        </font>
                    </span>
                </div>

            </div>

        </div>



    </div>

    <div class="row g-12">


        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{ $quantidadedepedidos }}" txt="Total de Pedidos" icon='fas fa-shopping-cart'
                link="/meus/agendamentos/empresa/{{ $idempresa }}/finalizados" class="small-box-footer" />

        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">


            <x-small-user tema="{{ $quantidadedepedidosmesatual }}" txt="Pedidos mês atual" icon='fas fa-shopping-cart'
                link="/meus/agendamentos/empresa/{{ $idempresa }}/finalizados" class="small-box-footer" />

        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-agendamentos-cancelados Porcentagemdepedidoscancelados="{{ $Porcentagemdepedidoscancelados }}"
                quantidadedepedidoscacenlados="{{ $quantidadedepedidoscacenlados }}"
                link="/meus/agendamentos/empresa/{{ $idempresa }}/cancelados" />

        </div>





    </div>
    <div class="row g-12">
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

        <x-small-user tema="{{ $clientemesatual }}" txt="Clientes mês atual" icon='fas fa-user-plus' link="#" />

        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <x-small-user tema="{{ $clientetotal }}" txt="Clientes total" icon='fas fa-user-plus'
                link="/dados/meus/clientes/{{ $idempresa }}/ativos" />
        </div>
    </div>

    @if ($metaAnual > 0)
        <label for="valorDaMetaAnual">Faturamento anual</label>
    @else
        <label for="valorDaMetaAnual">Crie uma meta de faturamento anual</label>
    @endif



    <form action="/atualizarmeta/{{ $idempresa }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-12">
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">

                <input type="text" class="form-control mascValor" id="valorDaMetaAnual" name="valorDaMetaAnual"
                    placeholder="Valor da meta anual" value="{{ $metaAnual }}"
                    aria-describedby="validationTooltipUsernamePrepend" inputmode="numeric" required />

            </div>

            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">

                <button type="submit" class="btn btn-info ">Salvar</button>
            </div>
        </div>

    </form>


    <div class="row g-12">




        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Faturamento Mensal</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_dashboardbusiness"
                            alt="{{ $empresa->razaoSocial }}">
                        <div class="info-box-content">
                            <span class="info-box-text">Volor recebido no mês atual</span>
                            <span class="info-box-number">
                                {{ 'R$ ' . number_format($valorMesAtual, 2, ',', '.') }}
                            </span>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: {{ $porcentagem_atingidamensal }}%">
                                </div>
                            </div>
                            <span class="progress-description">
                                @if ($porcentagem_atingidamensal == 100)
                                    {{ number_format($porcentagem_atingidamensal, 2, ',', '.') }}%
                                    </br>
                                    Meta mensal concluida
                                @else
                                    {{ number_format($porcentagem_atingidamensal, 2, ',', '.') }}% da
                                    Meta mensal {{ 'R$ ' . number_format($metamensal, 2, ',', '.') }}
                                    <br />
                                    @if ($ValorFaltaParaChegarNaMetamensal > 0)
                                        Falta R$
                                        {{ 'R$ ' . number_format($ValorFaltaParaChegarNaMetamensal, 2, ',', '.') }}
                                    @endif

                                @endif

                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Faturamento Anual</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="">

                                <img src="/img/logo_empresas/{{ $empresa->image }}"
                                    class="img-fluid  img_dashboardbusiness" alt="{{ $empresa->razaoSocial }}">
                                <div class="info-box-content">
                                    <span class="info-box-text">Volor recebido no ano</span>
                                    <span class="info-box-number">
                                        {{ 'R$ ' . number_format($faturamentoAnual, 2, ',', '.') }}
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info"
                                            style="width: {{ $porcentagem_atingidaanual }}%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                        @if ($porcentagem_atingidaanual == 100)
                                            {{ number_format($porcentagem_atingidaanual, 2, ',', '.') }}%
                                            </br>
                                            Meta anual concluida
                                        @else
                                            {{ number_format($porcentagem_atingidaanual, 2, ',', '.') }} % da
                                            Meta anual {{ 'R$ ' . number_format($metaAnual, 2, ',', '.') }}



                                            <br />
                                            @if ($ValorFaltaParaChegarNaMetamensal > 0)
                                                Falta
                                                {{ 'R$ ' . number_format($ValorFaltaParaChegarNaMetaAnual, 2, ',', '.') }}
                                            @endif

                                        @endif

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>








    </div>
    <div class="row g-12">


        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">

            <x-grafico-donut tema="Produtos mais agendados no mês atual" idgrafico="donutChartmesAtual" />

        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <x-grafico-donut tema="Produtos mais agendados" idgrafico="donutChart" />

        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <x-graficoPizza tema="Formas de pagamento" />



        </div>


        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">

            <x-grafico-coluna tema="Faturamento Anual" idgrafico="faruramentoAnual" />
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">

            <x-grafico-coluna tema="Pedidos por mês" idgrafico="PedidosPorMes" />
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
        var formasContagem = @json($formaPagamentoContagemTotal);
        var ProdutosContagem = @json($produtosTotal);
        var ProdutosContagemmesatual = @json($produtosmensal);
        var faruramentoAnual = @json($valorPorMes);
        var pedidosPorMes = @json($clientePormes);

    </script>

    <script src="{{ asset('/js/graficopizza.js') }}"></script>

    <script src="{{ asset('/js/GraficoDounut.js') }}"></script>

    <script src="{{ asset('/js/graficoColuna.js') }}"></script>

    <script src="{{ asset('/js/mascara.js') }}"></script>




    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

@stop
