<!DOCTYPE html>
<html>

<head>
    <title> Relatório do Cliente</title>
    <link type="text/css" href="{{ public_path('css/StylesRelatorio.css') }}" rel="stylesheet" />

</head>

<body>
    <h1>Relatório Produtos</h1>

    <table class="tabela-lateral">
        <tr>
            <th>Produtos</th>
            <th>Quantidade de agendamentos</th>
        </tr>
        @foreach ($produtosTotal as $produto => $quantidade)
            <tr>
                <td>{{ $produto }}</td>
                <td>{{ $quantidade }}</td>
            </tr>
        @endforeach
    </table>













</body>

</html>
