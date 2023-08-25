@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="row g-12">


        <div class="col-lg-12 col-sm-12 col-md-12 pt-2">
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
                                {{ 'R$ ' . number_format( $valorMesAtual , 2, ',', '.') }}
                            </span>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: {{  $porcentagem_atingidamensal }}%"></div>
                            </div>
                            <span class="progress-description">
                                @if ($porcentagem_atingidamensal == 100)
                                {{ number_format(  $porcentagem_atingidamensal, 2, ',', '.') }}%
                                </br>
                                Meta mensal concluida
                                @else
                                {{ number_format(  $porcentagem_atingidamensal, 2, ',', '.') }}% da
                                Meta mensal {{ 'R$ ' . number_format($metamensal, 2, ',', '.') }}
                                <br/>
                                Falta R$ {{ 'R$ ' . number_format($ValorFaltaParaChegarNaMetamensal, 2, ',', '.') }}


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

                                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_dashboardbusiness"
                                        alt="{{ $empresa->razaoSocial }}">
                                <div class="info-box-content">
                                    <span class="info-box-text">Volor recebido no ano</span>
                                    <span class="info-box-number">
                                        {{ 'R$ ' . number_format( $faturamentoAnual , 2, ',', '.') }}
                                    </span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: {{    $porcentagem_atingidaanual }}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        @if ($porcentagem_atingidaanual == 100)
                                        {{ number_format(  $porcentagem_atingidaanual, 2, ',', '.') }}%
                                        </br>
                                         Meta anual concluida
                                        @else
                                        {{ number_format(  $porcentagem_atingidaanual, 2, ',', '.') }} % da
                                        Meta anual {{ 'R$ ' . number_format($metaAnual, 2, ',', '.') }}



                                        <br/>
                                        Falta  {{ 'R$ ' . number_format($ValorFaltaParaChegarNaMetaAnual, 2, ',', '.') }}

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




    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="/css/StylesDashboard.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
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
                'Novembro','Outubro', 'Dezembro'
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
                            label += 'R$ ' + context.parsed.y.toFixed(
                                2); // Formatação como moeda (com 2 casas decimais)
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
@stop
