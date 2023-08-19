@extends('Layout.main')

@section('title', 'Carrinho')

@section('conteudo')


    @php
        $somaValores = 0;
        $dataAtual = date('d/m/Y');
    @endphp

    <div class="col-md-8 offset-md-2 pt-2">
        <div class="pt-2">
            {{--
            <div class="alert alert-light" role="alert" align="center">
                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_logoDadosServicoAgendamentos"
                    alt="{{ $empresa->razaoSocial }}">
                </br>
                Agendamento {{ strtolower($empresa->nomeFantasia) }}


            </div> --}}





        </div>


        <form action="/cadastrar/agentamento" method="POST">
            @csrf



                <x-cadastrar_agendamento
                user_id="{{ $user->id }}"
                numeroDopedio="{{ $numeroDopedio }}"
                empresaimage="{{  $empresa->image }}"
                empresa_razaoSocial="{{  $empresa->razaoSocial }}"
                empresa_nomeFantasia="{{ $empresa->nomeFantasia }}"
                dataAtual="{{ $dataAtual }}"
                empresa_logradouro="{{ $empresa->logradouro }}"
                empresa_numero_endereco="{{ $empresa->numero_endereco }}"
                empresa_cidade="{{ $empresa->cidade }}"
                empresa_uf="{{ $empresa->uf }}"
                empresa_telefone="{{ $empresa->telefone }}"
                empresa_celular="{{ $empresa->celular }}"
                user_name="{{ $user->name }}"
                user_email="{{ $user->email }}"
                user_phone="{{ $user->phone }}"
                empresa_id="{{ $empresa->id }}"
                :servico="$servico"
                :empresa_formaDePagamento="$empresa->formaDePagamento"
                />



        </form>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll(".deleteButton");

            deleteButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var row = this.closest("tr");
                    if (row) {
                        var hiddenInput = row.querySelector(
                            'input[name="valorUnitatioAgendamento[]"]');
                        var valorUnitatio = parseFloat(hiddenInput
                            .value); // Converte para tipo numérico

                        var valorTotalInput = document.getElementById("valorTotal");
                        var valorTotalInputsub = document.getElementById("valorTotalsub");

                        var valortotal = parseFloat(valorTotalInputsub
                            .value);


                        var sub = valortotal - valorUnitatio;
                        if (sub == 0) {

                            var div = document.getElementById("tabela");
                            div.innerHTML = `
                                <div class="alert alert-light" role="alert">
                                    <a class="alert-link" href="/empresas/dados/{{ $empresa->id }}">Seu carrinho está vazio. Por favor, clique aqui e adicione mais produtos.</a>
                                </div>
                            `;

                        }

                        valorTotalInputsub.value = sub >= 0 ? sub : 0;
                        valorTotalInput.value = (sub >= 0 ? sub : 0).toFixed(2).replace(".",
                            ",");




                        row.remove();

                    }
                });
            });
        });
    </script>

    <script>
        // Evento de clique nos inputs
        var inputs = document.querySelectorAll('input[name="FormaDepagamentoAgendamento"]');
        inputs.forEach(function(input) {
            input.addEventListener('click', function() {
                var selectedValue = this.value;

            });
        });

        $(document).ready(function() {
            $('.campodesablitado').on('keydown paste', function(e) {
                e.preventDefault();
            });
        });
    </script>



@endsection
