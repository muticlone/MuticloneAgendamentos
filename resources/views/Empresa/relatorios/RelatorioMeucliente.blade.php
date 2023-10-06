<!DOCTYPE html>
<html>

<head>
    <title>{{ $dados['nome'] }} - Relatório do Cliente</title>
    <link type="text/css" href="{{ public_path('css/StylesRelatorio.css') }}" rel="stylesheet" />

</head>

<body>
    <h1>Relatório do Cliente</h1>
    <div class="cliente-info">









        <table class="tabela-lateral">
            <tr>

            </tr>

                <tr>
                    <td>Nome: </td>
                    <td>{{ $dados['nome'] }}</td>
                </tr>
                <tr>
                    <td>Contato :</td>
                    <td>{{ $dados['contato'] }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $dados['email'] }}</td>

                </tr>
                <tr>
                    <td>Cliente desde: </td>
                    <td> {{ $dados['clienteDesDe'] }}</td>

                </tr>
                <tr>
                    <td>Último agendamento: </td>
                    <td>{{ $dados['ultimoAgendamento'] }}</td>
                </tr>
                <tr>
                    <td>Total gasto: </td>
                    <td>R$ {{ $dados['totalGasto'] }}</td>
                </tr>

                <tr>
                    <td>Pedidos Finalizados :</td>
                    <td>{{ $dados['numeroDoPedidos'] }}</td>
                </tr>
                <tr>
                    <td>Pedidos Confirmados :</td>
                    <td>{{ $dados['numeroDeconfirmados'] }}</td>
                </tr>



                <tr>
                    <td>
                      Pedidos aguardando confirmar:
                    </td>
                    <td>
                        {{ $dados['numeroDenaoconfirmados'] }}
                    </td>
                </tr>
                <tr>
                    <td>Pedidos Cancelados:</td>
                    <td>
                        {{ $dados['PedidosCanelados'] }}
                    </td>
                </tr>
                <tr>
                    <td>Todos os pedidos</td>
                    <td>
                        {{ $dados['totalDepedidos'] }}
                    </td>
                </tr>
                <tr>
                    <td> Porcentagem de agendamentos cancelados: </td>
                    <td>{{ $dados['porcentagemDeCancelamento'] }}%</td>
                </tr>

        </table>

        <table class="tabela-lateral">
            <tr>
                <th>Formas de pagamento utilizados</th>
                <th>Quantidade</th>
            </tr>
            @foreach ($formasPagamento as $pagamento)
                <tr>
                    <td>{{ $pagamento['pagamento'] }}</td>
                    <td>{{ $pagamento['quantidades'] }}</td>

                </tr>

            @endforeach
        </table>

        <table class="tabela-lateral">
            <tr>
                <th>Produtos agendados</th>
                <th>Quantidade</th>

            </tr>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto['servico']  }}

                    </td>
                    <td>
                        {{ $produto['quantidade'] }}
                    </td>

                </tr>

            @endforeach
        </table>











    </div>
</body>

</html>
