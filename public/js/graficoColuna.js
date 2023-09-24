var stackedBarCtx1 = document.getElementById('faruramentoAnual').getContext('2d');

var meses = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
    'November', 'December'
];

var dadosMeses = meses.map(function(mes) {
    return faruramentoAnual[mes] || 0;
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
                callback: function(value, index, values) {
                    return 'R$ ' + value.toFixed(2);
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
                    var formattedValue = context.parsed.y.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    label += 'R$ ' + formattedValue;
                    return label;
                }
            }
        }
    }
};

var myStackedBarChart1 = new Chart(stackedBarCtx1, {
    type: 'bar',
    data: stackedBarData,
    options: stackedBarOptions
});

// grafico 2
var stackedBarCtx2 = document.getElementById('PedidosPorMes').getContext('2d');

var mesespeidospormes = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
    'November', 'December'
];

var dadospedidospormes = mesespeidospormes.map(function(mes) {
    return pedidosPorMes[mes] || 0;
});

var stackedBarDatapedidospormes = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
        'Novembro', 'Outubro', 'Dezembro'
    ],
    datasets: [{
        label: 'Pedidos por mês',
        data: dadospedidospormes,
        backgroundColor: 'RGB(91, 192, 222)',
    }]
};

var stackedBarOptionspedidospormes = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            stacked: true
        },
        y: {
            stacked: true,
            ticks: {
                callback: function(value, index, values) {
                    return value.toFixed(0);
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
                    label += context.parsed.y.toFixed(0);
                    return label;
                }
            }
        }
    }
};

var myStackedBarChart2 = new Chart(stackedBarCtx2, {
    type: 'bar',
    data: stackedBarDatapedidospormes,
    options: stackedBarOptionspedidospormes
});
