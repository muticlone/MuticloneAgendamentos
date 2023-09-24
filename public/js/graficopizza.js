// meu_script.js

document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('pieChart').getContext('2d');

    console.log(formasContagem);

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
});
