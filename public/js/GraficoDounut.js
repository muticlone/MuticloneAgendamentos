function generateVariedColors(count) {
    const scale = chroma.scale(['#FF5733', '#33FFB4', '#FFFF00', '#1E90FF', '#5F9EA0']).mode('lch').colors(count);
    return scale;
}

//grafico produtos mais consumidos geral


var donutChartCanvas = document.getElementById('donutChart').getContext('2d');



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


//grafico 2 produtos mais consumidos mes atual

var donutChartCanvas = document.getElementById('donutChartmesAtual').getContext('2d');



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


