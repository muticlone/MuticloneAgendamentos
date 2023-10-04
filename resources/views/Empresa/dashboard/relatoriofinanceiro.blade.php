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


    <h1>Relatório financeiro </h1>

    <table class="tabela-lateral">
        <thead>
            <tr>

            </tr>
        </thead>
        <tbody>

            </tr>

            <td>Meta faturamento anual</td>
            <td> {{ $dados['metaAnual'] }}</td>
            </tr>
            <tr>
                <td>Meta faturamento mensal</td>
                <td> {{ $dados['metamensal'] }}
                </td>
            </tr>
        </tbody>
    </table>


    <table class="tabela-lateral">
        <thead>
            <tr>
                <th>Valores recebidos</th>
                <th>Mês</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($valorPorMes as $mes => $valor)
                @if ($valor != 0)
                    <tr>

                        <td>
                            {{ 'R$ ' . number_format($valor, 2, ',', '.') }}
                        </td>
                        <td>{{ $mes }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>







    <table class="tabela-lateral">
        <tr>
            <th>Forma de pagamento</th>
            <th>Quantidade</th>
        </tr>
        @foreach ($formaPagamentoContagemTotal as $item)
            @foreach ($item as $forma => $quantidade)
                <tr>
                    <td>{{ $forma }}</td>
                    <td>{{ $quantidade }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>

    <table class="tabela-lateral">
        <thead>
            <tr>

            </tr>
        </thead>
        <tbody>
            <td>Faturamento anual</td>
            <td>
                {{ 'R$ ' . number_format($dados['faturamentoAnual'], 2, ',', '.') }}
            </td>
        </tbody>
    </table>









</body>

</html>
