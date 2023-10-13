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
    <div class="pt-2">
        <div class="row g-12">
            <div class="col-3">
                <form action="/relatorio/clientes/{{ $idempresa }}">

                    <x-btn-relatorio nome="Relatório pedidos" />
                </form>
            </div>
            <div class="col-3">
                <form action="/relatorio/financeiro/{{ $idempresa }}">

                    <x-btn-relatorio nome="Relatório financeiro" />


                </form>
            </div>

            <div class="col-3">
                <form action="/relatorio/produtos/{{ $idempresa }}">

                    <x-btn-relatorio nome="Relatório Produtos" />


                </form>
            </div>


            <div class="col-3">
                <form action="/relatorio/ranking/{{ $idempresa }}">

                    <x-btn-relatorio nome="Relatório ranking" />


                </form>
            </div>


        </div>


    </div>

    <div class="row g-12">

        <div class="col-lg-12 col-sm-12 col-md-12 pt-2 ">

            <div class="card card-widget widget-user">

                <div class="widget-user-header bg-info ">
                    <div class="star">
                        <input id="input-6" name="input-6" class="rating rating-loading pt-br "
                            value="{{ $media }}" data-min="0" data-max="5" data-step="0.1" data-readonly="true"
                            data-show-clear="false" data-size="xs" style="margin: 0 auto; display: block;">
                    </div>
                </div>


                <div class="widget-user-image">
                    <img class="img-circle elevation-3 img-fluid" style="width: 110px; height: 110px;"
                        src="/img/logo_empresas/{{ $empresa->image }}" alt="{{ $empresa->razaoSocial }}">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12  mx-2 ">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <h3 class="widget-user-username">{{ ucfirst($empresa->nomeFantasia) }}</h3>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-12">
                        <div class="col-lg-4 col-sm-12 col-md-12 ">
                            <x-cardadminlte ico="far fa-star" tema="Usuários que favoritaram" info="" />
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 ">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-cardadminlte ico="fas fa-users" tema="Novos Clientes no mês atual" info="" />
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

                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-small-user tema="{{ $quantidadedepedidos }}" txt="Pedidos finalizados"
                                        icon='fas fa-shopping-cart'
                                        link="/meus/agendamentos/empresa/{{ $idempresa }}/finalizados"
                                        class="small-box-footer" />



                                </span>
                            </div>
                        </div>


                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <x-small-user tema="{{ $agendamentosconfirmados }}" txt="Pedidos confirmados"
                                    icon='fas fa-shopping-cart'
                                    link="/meus/agendamentos/empresa/{{ $idempresa }}/confirmados"
                                    class="small-box-footer" />

                            </div>



                        </div>


                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">

                                    <x-small-user tema="{{ $numeroDenaoconfirmados }}" txt="Pedidos aguardando confirmar"
                                        icon='fas fa-shopping-cart'
                                        link="/meus/agendamentos/empresa/{{ $idempresa }}/pendentes"
                                        class="small-box-footer" />

                                </span>

                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">

                                    <x-small-user tema="{{ $todosOspedidos }}" txt="Todos os Pedidos"
                                        icon='fas fa-shopping-cart'
                                        link="/meus/agendamentos/empresa/{{ $idempresa }}/todos"
                                        class="small-box-footer" />

                                </span>

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">


                                    <x-small-user tema="{{ $quantidadedepedidoscacenlados }}"
                                        txt="Pedidos cancelados {{ $Porcentagemdepedidoscancelados }}"
                                        link="/meus/agendamentos/empresa/{{ $idempresa }}/cancelados"
                                        icon='fa fa-times' />


                                </span>

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">

                                    <x-small-user tema="{{ $clientetotal }}" txt="Clientes total"
                                        icon='fas fa-user-plus' link="/dados/meus/clientes/{{ $idempresa }}/ativos" />
                                </span>

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">

                                    <x-small-user tema="{{ ucfirst($nomeClienteMaisFrequente) }} "
                                        txt="{{ $quantidadeRepeticoes }}" icon='fas fa-user-plus'
                                        btntxt="Mais informação, cliente com a maior frequência "
                                        link="/cliente/ranks/{{ $idempresa }}" />

                                </span>

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">


                                    <x-small-user tema="{{ $quantidadedepedidosmesatual }}" txt="Pedidos mês atual"
                                        icon='fas fa-shopping-cart'
                                        link="/meus/agendamentos/empresa/{{ $idempresa }}/finalizados"
                                        class="small-box-footer" />
                                </span>

                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">


                                    <x-small-user tema="{{ $clientemesatual }}" txt="Clientes mês atual"
                                        icon='fas fa-user-plus' link="#" />

                                </span>

                            </div>
                        </div>


                    </div>

                    <div class="row g-12">

                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    @if ($metaAnual > 0)
                                        <label for="valorDaMetaAnual">Meta de faturamento anual</label>
                                    @else
                                        <label for="valorDaMetaAnual">Crie uma meta de faturamento anual</label>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <form action="/atualizarmeta/{{ $idempresa }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row g-12">
                                            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">

                                                <input type="text" class="form-control mascValor"
                                                    id="valorDaMetaAnual" name="valorDaMetaAnual"
                                                    placeholder="Valor da meta anual" value="{{ $metaAnual }}"
                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                    inputmode="numeric" required />

                                            </div>

                                            <div class="col-lg-1 col-sm-12 col-md-12 pt-2">

                                                <button type="submit" class="btn btn-info ">Salvar</button>
                                            </div>
                                        </div>

                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-12">

                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
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
                                                <img src="/img/logo_empresas/{{ $empresa->image }}"
                                                    class="img-fluid  img_dashboardbusiness"
                                                    alt="{{ $empresa->razaoSocial }}">
                                                <div class="info-box-content">
                                                    <span class="info-box-text">Volor recebido no mês atual</span>
                                                    <span class="info-box-number">
                                                        {{ 'R$ ' . number_format($valorMesAtual, 2, ',', '.') }}
                                                    </span>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info"
                                                            style="width: {{ $porcentagem_atingidamensal }}%">
                                                        </div>
                                                    </div>
                                                    <span class="progress-description">
                                                        @if ($porcentagem_atingidamensal == 100)
                                                            {{ number_format($porcentagem_atingidamensal, 2, ',', '.') }}%
                                                            </br>
                                                            Meta mensal concluida
                                                        @else
                                                            {{ number_format($porcentagem_atingidamensal, 2, ',', '.') }}%
                                                            da
                                                            Meta mensal
                                                            {{ 'R$ ' . number_format($metamensal, 2, ',', '.') }}
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
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
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
                                                            class="img-fluid  img_dashboardbusiness"
                                                            alt="{{ $empresa->razaoSocial }}">
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
                                                                    {{ number_format($porcentagem_atingidaanual, 2, ',', '.') }}
                                                                    % da
                                                                    Meta anual
                                                                    {{ 'R$ ' . number_format($metaAnual, 2, ',', '.') }}



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

                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row g-12">
                        @if ($produtosmensal)
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                <div class="description-block">
                                    <span class="info-box-number">



                                        <x-grafico-donut tema="Produtos mais agendados no mês atual"
                                            idgrafico="donutChartmesAtual" />


                                    </span>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-grafico-donut tema="Produtos mais agendados" idgrafico="donutChart" />
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-graficoPizza tema="Formas de pagamento" />
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-grafico-coluna tema="Faturamento Anual" idgrafico="faruramentoAnual" />
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="description-block">
                                <span class="info-box-number">
                                    <x-grafico-coluna tema="Pedidos por mês" idgrafico="PedidosPorMes" />
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
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
