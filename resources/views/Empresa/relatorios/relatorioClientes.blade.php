<!DOCTYPE html>
<html>

<head>
    <title> Relatório do Cliente</title>
    <link type="text/css" href="{{ public_path('css/StylesRelatorio.css') }}" rel="stylesheet" />

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

            <tr>
                <td>Cliente com a maior frequência</td>
                <td> {{ $dados['clienteComMaisAgendamentos'] }}</td>
            </tr>
            <tr>
                <td>Quantidade de agendamentos feitos por {{ $dados['clienteComMaisAgendamentos'] }}</td>
                <td> {{ $dados['quantidadeRepeticoes'] }}</td>
            </tr>




        </table>
    </div>


















</body>

</html>
