@extends('adminlte::page')

@section('title', 'My View')

@section('content_header')
    <h1>My View</h1>
@stop

@section('content')
    <div class="row g-12">


        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Pedidos no mês atual</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Volor recebido no mês</span>
                    <span class="info-box-number">R$ 41.410,30</span>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                        50% atigindo Meta R$ 82.820,60
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <div class="card card-success">
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
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Produtos</h3>
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
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');


        var data = {
            labels: ['produto 1', 'produto 2', 'produto 3', 'produto 4', 'produto 5'],
            datasets: [{
                data: [12, 19, 3, 5, 2],
                backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple']
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false
        };

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });


        var stackedBarCtx = document.getElementById('myStackedBarChart').getContext('2d');

        var stackedBarData = {
            labels: ['Janeiro', 'Fevereiro', 'março', 'Abril', 'Maio', 'Junho', 'julho', 'Agosto', 'Setembro',
                'Novembro', 'Dezembro'
            ],
            datasets: [{
                label: 'Faturamento',

                data: [10, 20, 30, 40, 50, 30, 70, 80, 10, 5, 10, 90],

                backgroundColor: 'Blue',
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
                    stacked: true
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
