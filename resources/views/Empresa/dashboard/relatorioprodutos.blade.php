<!DOCTYPE html>
<html>

<head>
    <title> Relatório do Cliente</title>
    <style>
        /* Estilos para a tabela */
        .tabela-lateral table {
            border-collapse: collapse;
            width: 700px;
        }

        table {
            width: 100%;
            height: 100vh;
            /* Isso define a altura da tabela para ocupar a altura da tela */
        }

        /* Estilos para as células da tabela */
        .tabela-lateral th,
        .tabela-lateral td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        /* Estilo para o cabeçalho da tabela */
        .tabela-lateral th {
            background-color: #f2f2f2;
        }
    </style>
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
