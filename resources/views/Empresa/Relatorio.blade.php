<!DOCTYPE html>
<html>

<head>
    <title>{{ $dados['nome'] }} - Relatório do Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }


    </style>
</head>

<body>
    <h1>Relatório do Cliente</h1>
    <div class="cliente-info">
        <p><strong>Nome:</strong> {{ $dados['nome'] }}</p>
        <p><strong>Contato:</strong> {{ $dados['contato'] }}</p>
        <p><strong>Email:</strong> {{ $dados['email'] }}</p>
        <p><strong>Cliente desde:</strong> {{ $dados['clienteDesDe'] }}</p>
        <p><strong>Total gasto</strong> R$ {{ $dados['totalGasto'] }}</p>
        <p><strong>Último agendamento:</strong> {{ $dados['ultimoAgendamento'] }}</p>
        <p><strong>Pedidos Finalizados :</strong> {{ $dados['numeroDoPedidos'] }}</p>
        <p><strong>Pedidos Cancelados:</strong> {{ $dados['PedidosCanelados'] }}</p>
        <p><strong>Porcentagem de agendamentos cancelados:</strong> {{ $dados['porcentagemDeCancelamento'] }}%</p>
        <p><strong>Pedidos aguardando confirmar:</strong> {{ $dados['numeroDenaoconfirmados'] }}</p>
        <p><strong>Formas de pagamento:</strong> </p>
        @foreach ($formasPagamento as $pagamento)
            {{ $pagamento }}
            @if (!$loop->last)
                {{-- Adicione uma vírgula se não for o último elemento --}}
                ,
            @endif
        @endforeach
        </br>
        <p><strong>Produtos agendados:</strong> </p>
        @foreach ($produto as $produtos)
            {{ $produtos }}
            @if (!$loop->last)
                {{-- Adicione uma vírgula se não for o último elemento --}}
                ,
            @endif
        @endforeach



    </div>
</body>

</html>
