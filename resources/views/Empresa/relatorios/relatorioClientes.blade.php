<!DOCTYPE html>
<html>

<head>
    <title> Relatório do agendamentos</title>
    <link type="text/css" href="{{ public_path('css/StylesRelatorio.css') }}" rel="stylesheet" />

</head>

<body>
    <h1>Relatório clientes {{ $dados['nome'] }}</h1>

    <div class="tabela-lateral">
        <table>
            <tr>

            </tr>
            <tr>
                <td>Pedidos finalizados</td>
                <td>{{ $dados['quantidadeTotalDePedidosfinalizados'] }}</td>
            </tr>


            <tr>
                <td>Pedidos confirmados</td>
                <td> {{ $dados['numeroconfirmados'] }}</td>
            </tr>

            <tr>
                <td>Pedidos aguardando confirmar</td>
                <td> {{ $dados['numerodenaoconfirmados'] }}</td>
            </tr>



            <tr>
                <td>Pedidos cancelados</td>
                <td> {{ $dados['quantidadedepedidoscacenlados'] }}</td>
            </tr>
            <tr>
                <td>Taxa de cancelamento</td>
                <td> {{ $dados['taxaCancelamento'] }}</td>
            </tr>

            <tr>
                <td>Total de Pedidos</td>
                <td> {{ $dados['Cancelados/confirmados'] }}</td>
            </tr>



            <tr>
                <td>Total de clientes com pedidos finalizados</td>
                <td> {{ $dados['totalDeClientes'] }}</td>
            </tr>
            {{-- <tr>
                <td>Pedidos mês atual finalizados</td>
                <td>{{ $dados['quantidadedepedidosmesatual'] }}</td>
            </tr>
            <tr>
                <td>Clientes mês atual</td>
                <td> {{ $dados['clientemesatual'] }}</td>
            </tr> --}}

            <tr>
                <td>Cliente com a maior frequência</td>
                <td> {{ $dados['clienteComMaisAgendamentos'] }}: {{ $dados['quantidadeRepeticoes'] }}</td>
            </tr>





        </table>
    </div>


















</body>

</html>
