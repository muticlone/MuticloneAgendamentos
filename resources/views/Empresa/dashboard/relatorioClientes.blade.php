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
    <h1>Relatório {{ $dados['nome'] }}</h1>

    <div class="tabela-lateral">
        <table>
            <tr>

            </tr>
            <tr>
                <td>Total de agendamentos confirmados</td>
                <td>{{ $dados['quantidadeTotalDePedidos'] }}</td>
            </tr>
            <tr>
                <td>Agendamentos mês atual confirmados</td>
                <td>{{ $dados['quantidadedepedidosmesatual'] }}</td>
            </tr>
            <tr>
                <td>Total de agendamentos cancelados</td>
                <td> {{ $dados['quantidadedepedidoscacenlados'] }}</td>
            </tr>

            <tr>
                <td>Agendamentos Confirmados/Cancelados</td>
                <td> {{ $dados['Cancelados/confirmados'] }}</td>
            </tr>

            <tr>
                <td>Taxa de cancelamento</td>
                <td> {{ $dados['taxaCancelamento'] }}</td>
            </tr>

            <tr>
                <td>Total de clientes</td>
                <td> {{ $dados['totalDeClientes'] }}</td>
            </tr>
            <tr>
                <td>Clientes mês atual</td>
                <td> {{ $dados['clientemesatual'] }}</td>
            </tr>




        </table>
    </div>


















</body>

</html>
