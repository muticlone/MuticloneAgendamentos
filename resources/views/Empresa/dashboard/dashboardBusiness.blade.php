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

    {{-- <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                @if (session('msgErro'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('msgErro') }}
                    </div>
                @endif
                @yield('conteudo')
            </div>
        </div>
    </main> --}}
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
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $quantidadedepedidos }}</h3>
                    <p>Total de Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <a href="/meus/agendamentos/empresa/{{ $idempresa }}/finalizados" class="small-box-footer">
                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $quantidadedepedidosmesatual }}</h3>
                    <p>Pedidos mês atual</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <a href="/meus/agendamentos/empresa/{{ $idempresa }}/finalizados" class="small-box-footer">
                    Mais informações <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">



            <x-agendamentos-cancelados Porcentagemdepedidoscancelados="{{ $Porcentagemdepedidoscancelados }}"
            quantidadedepedidoscacenlados="{{ $quantidadedepedidoscacenlados }}"
            link="/meus/agendamentos/empresa/{{ $idempresa }}/cancelados" />

        </div>





    </div>
    <div class="row g-12">
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $clientemesatual }}</h3>
                    <p style="  font-size: 15px;">Clientes mês atual</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $clientetotal }}</h3>
                    <p>Clientes total</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
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
            {{-- sair --}}
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
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myStackedBarChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 367px;"
                            width="734" height="500" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

            </div>
        </div>



        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Formas de pagamento</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pieChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 312px;"
                        width="624" height="500" class="chartjs-render-monitor"></canvas>
                </div>

            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Produtos mais agendados no mês atual </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChartmesAtual"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 601px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Produtos mais agendados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 601px;"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Pedidos por Mês</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myStackedBarChartClientes"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 367px;"
                            width="734" height="500" class="chartjs-render-monitor"></canvas>
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
        var ctx = document.getElementById('pieChart').getContext('2d');
        var formasContagem = @json($formasContagem);

        // Filtra para remover entradas com valores igual a zero
        formasContagem = Object.fromEntries(Object.entries(formasContagem).filter(([key, value]) => value !== 0));

        var labelsFormaPagamento = Object.keys(formasContagem);
        var dataFormaPagamento = Object.values(formasContagem);

        // Mapeia as chaves para rótulos personalizados, se necessário
        var labelsPersonalizados = labelsFormaPagamento.map(function(label) {
            if (label === 'Dinheiro') {
                return 'Pagamento em Dinheiro';
            } else {
                return label; // Mantém os outros rótulos
            }
        });

        var data = {
            labels: labelsPersonalizados,
            datasets: [{
                data: dataFormaPagamento,
                backgroundColor: ['#FFFF00',
                    '#1E90FF',
                    'green',
                    '#ADFF2F',
                    'orange',
                    '#DAA520',
                    '#5F9EA0'
                ]
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        };

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });


        function generateVariedColors(count) {
            const scale = chroma.scale(['#FF5733', '#33FFB4', '#FFFF00', '#1E90FF', '#5F9EA0']).mode('lch').colors(count);
            return scale;
        }

        var donutChartCanvas = document.getElementById('donutChart').getContext('2d');

        var ProdutosContagem = @json($produtosTotal);

        // Filtra para remover entradas com valores igual a zero
        ProdutosContagem = Object.fromEntries(Object.entries(ProdutosContagem).filter(([key, value]) => value !== 0));

        var labelsprodutosPagamento = Object.keys(ProdutosContagem);
        var dataprodutos = Object.values(ProdutosContagem);

        // Gerar cores variadas baseadas no número de fatias
        var backgroundColorsprodutos = generateVariedColors(labelsprodutosPagamento.length);

        // Dados do gráfico
        var data = {
            labels: labelsprodutosPagamento,
            datasets: [{
                data: dataprodutos,
                backgroundColor: backgroundColorsprodutos
            }]
        };

        // Opções do gráfico
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true,
            },
            cutoutPercentage: 50, // Define o tamanho do "buraco" no meio do gráfico
        };

        // Criando o gráfico Donut
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: data,
            options: donutOptions
        });

        var donutChartCanvas = document.getElementById('donutChartmesAtual').getContext('2d');

        var ProdutosContagemmesatual = @json($produtosmensal);

        // Filtra para remover entradas com valores igual a zero
        ProdutosContagemmesatual = Object.fromEntries(Object.entries(ProdutosContagemmesatual).filter(([key, value]) =>
            value !== 0));

        var labelsprodutosmesatual = Object.keys(ProdutosContagemmesatual);
        var dataprodutosmesatual = Object.values(ProdutosContagemmesatual);

        // Gerar cores variadas baseadas no número de fatias
        var backgroundColorsprodutos = generateVariedColors(labelsprodutosPagamento.length);

        // Dados do gráfico
        var data = {
            labels: labelsprodutosmesatual,
            datasets: [{
                data: dataprodutosmesatual,
                backgroundColor: backgroundColorsprodutos
            }]
        };

        // Opções do gráfico
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: true,
            },
            cutoutPercentage: 50, // Define o tamanho do "buraco" no meio do gráfico
        };

        // Criando o gráfico Donut
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: data,
            options: donutOptions
        });




        var stackedBarCtx = document.getElementById('myStackedBarChart').getContext('2d');
        var valorPorMes = @json($valorPorMes);

        var meses = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        var dadosMeses = meses.map(function(mes) {
            return valorPorMes[mes] || 0;
        });

        var stackedBarData = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                'Novembro', 'Outubro', 'Dezembro'
            ],
            datasets: [{
                label: 'Faturamento',
                data: dadosMeses,
                backgroundColor: 'RGB(91, 192, 222)',
            }]
        };

        var stackedBarOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    ticks: {
                        // Formatação para os valores do eixo y
                        callback: function(value, index, values) {

                            return 'R$ ' + value.toFixed(2); // Formatação como moeda (com 2 casas decimais)
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            var formattedValue = context.parsed.y.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                            label += 'R$ ' + formattedValue; // Formatação como moeda (com 2 casas decimais)
                            return label;
                        }
                    }
                }
            }
        };

        var myStackedBarChart = new Chart(stackedBarCtx, {
            type: 'bar',
            data: stackedBarData,
            options: stackedBarOptions
        });

        var stackedBarCtx = document.getElementById('myStackedBarChartClientes').getContext('2d');
        var valorPorMes = @json($clientePormes);



        var meses = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        var dadosMeses = meses.map(function(mes) {
            return valorPorMes[mes] || 0;
        });

        var stackedBarData = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                'Novembro', 'Outubro', 'Dezembro'
            ],
            datasets: [{
                label: 'Pedidos por mês',
                data: dadosMeses,
                backgroundColor: 'RGB(91, 192, 222)',
            }]
        };

        var stackedBarOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true,
                    ticks: {
                        // Formatação para os valores do eixo y
                        callback: function(value, index, values) {
                            return value.toFixed(0); // Formatação como moeda (com 2 casas decimais)
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.parsed.y.toFixed(
                                0); // Formatação como moeda (com 2 casas decimais)
                            return label;
                        }
                    }
                }
            }
        };

        var myStackedBarChart = new Chart(stackedBarCtx, {
            type: 'bar',
            data: stackedBarData,
            options: stackedBarOptions
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.mascValor').inputmask({
                alias: 'numeric',
                rightAlign: false,
                radixPoint: ',',
                groupSeparator: '.',
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                placeholder: '0',
                allowMinus: false,
                prefix: 'R$ ',
                clearMaskOnLostFocus: false // Mantém a máscara após perder o foco
            });
        });
    </script>

    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

@stop
