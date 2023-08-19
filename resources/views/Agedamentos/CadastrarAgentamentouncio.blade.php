@extends('Layout.main')

@section('title', 'Agendar')

@section('conteudo')

    @php
        $somaValores = 0;
        $dataAtual = date('d/m/Y');
    @endphp

    <div class="col-md-8 offset-md-2 pt-2">


        <form action="{{ route('cadastrar.agendamentoProdutouncio') }}" method="POST">



            <x-cadastrar_agendamento user_id="{{ $user->id }}" numeroDopedio="{{ $numeroDopedio }}"
                empresaimage="{{ $empresa->image }}" empresa_razaoSocial="{{ $empresa->razaoSocial }}"
                empresa_nomeFantasia="{{ $empresa->nomeFantasia }}" dataAtual="{{ $dataAtual }}"
                empresa_logradouro="{{ $empresa->logradouro }}" empresa_numero_endereco="{{ $empresa->numero_endereco }}"
                empresa_cidade="{{ $empresa->cidade }}" empresa_uf="{{ $empresa->uf }}"
                empresa_telefone="{{ $empresa->telefone }}" empresa_celular="{{ $empresa->celular }}"
                user_name="{{ $user->name }}" user_email="{{ $user->email }}" user_phone="{{ $user->phone }}"
                empresa_id="{{ $empresa->id }}" :empresa_formaDePagamento="$empresa->formaDePagamento" servico_imageservico="{{ $servico->imageservico }}"
                servico_nomeServico="{{ $servico->nomeServico }}" servico_id="{{ $servico->id }}"
                servico_duracaohoras="{{ $servico->duracaohoras }}"
                servico_duracaominutos="{{ $servico->duracaominutos }}"
                servico_valorDoServico="{{ $servico->valorDoServico }}" />




        </form>
    </div>


    <script>
        document.getElementById('remover').addEventListener('click', function() {
            var div = document.getElementById("tabela");
            div.innerHTML = `
                     <div class="alert alert-light" role="alert">
                     <a class="alert-link" href="/empresas/dados/{{ $empresa->id }}">Seu carrinho está vazio. Por favor, clique aqui e adicione mais produtos.</a>
                    </div>`;
        });

        var inputs = document.querySelectorAll('input[name="FormaDepagamentoAgendamento"]');
        inputs.forEach(function(input) {
            input.addEventListener('click', function() {
                var selectedValue = this.value;

            });
        });
    </script>




@endsection
