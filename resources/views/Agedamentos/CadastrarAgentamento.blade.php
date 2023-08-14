@extends('Layout.main')

@section('title', 'Carrinho')

@section('conteudo')


    @php
        $somaValores = 0;
    @endphp

    <div class="col-md-8 offset-md-2 pt-2">
        <div class="pt-2">

            <div class="alert alert-light" role="alert" align="center">
                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_logoDadosServicoAgendamentos"
                    alt="{{ $empresa->razaoSocial }}">
                </br>
                Agendamento {{ strtolower($empresa->nomeFantasia) }}


            </div>




        </div>


        <form action="/cadastrar/agentamento" method="POST">
            <div class="row g-12">

                <div class="col-4 ">
                    <label for="valor">Nome</label>




                    <input type="text" name="NomeUser" id="NomeUser" class="form-control campodesablitado"
                        value=" {{ $user->name }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">



                </div>
                <div class="col-3 ">
                    <label for="valor">Celular</label>

                    <input type="text" name="celularUser" id="celularUser" class="form-control campodesablitado"
                        value=" {{ $user->phone }}">


                </div>
                <div class="col-5 ">
                    <label for="valor">E-mail</label>


                    <input type="text" name="emailUser" id="emailUser" class="form-control campodesablitado"
                        value="  {{ $user->email }}">



                </div>


            </div>




            @csrf
            <input type="hidden" name="cadastro_de_empresas_id" value="{{ $empresa->id }}">

            <div class="row g-12 pt-4" id="tabela">

                <table class="table  table-hover">
                    <thead>
                        <tr class="tituloagendamento">
                            <th scope="col">Produto</th>
                            <th scope="col">Duração</th>

                            <th scope="col">Valor un</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servico as $servico)
                            <tr class="textagendamento" name="produtos">
                                <td>
                                    <img src="/img/logo_servicos/{{ $servico->imageservico }}"
                                        alt="{{ $servico->nomeServico }}" class="imgtabela">
                                    {{ $servico->nomeServico }}

                                    <input type="hidden" name="nomeServiçoAgendamento[]"
                                        value="{{ $servico->nomeServico }}">
                                    <input type="hidden" name="idServiçoAgendamento[]" value="{{ $servico->id }}">
                                </td>
                                <td>
                                    @if ($servico->duracaohoras > 1)
                                        {{ $servico->duracaohoras }}
                                        @if ($servico->duracaohoras == '1')
                                            Hora
                                        @else
                                            Horas
                                        @endif
                                    @endif

                                    {{ $servico->duracaominutos }}
                                    minutos
                                    <input type="hidden" name="duracaohorasAgendamento[]"
                                        value="{{ $servico->duracaohoras }}">
                                    <input type="hidden" name="duracaominutosAgendamento[]"
                                        value="{{ $servico->duracaominutos }}">
                                </td>
                                <td>
                                    R$ {{ $servico->valorDoServico }}
                                    <input type="hidden" name="valorUnitatioAgendamento[]"
                                        value="{{ $servico->valorDoServico }}">
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm deleteButton">Remover</a>
                                </td>
                            </tr>
                            @php
                                $somaValores += $servico->valorDoServico;
                            @endphp
                        @endforeach

                    </tbody>





                </table>



                <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                    <h5 class="card-title">Formas de Pagamento</h5>
                    <ul id="items-list">
                        @foreach ($empresa->formaDePagamento as $formadepagamento)
                            <li>
                                <div class="listadepagamentos">
                                    <input id="teste" class="form-check-input" style="margin-right:10px;" type="radio"
                                        name="formaDepagamentoAgendamento" value="{{ $formadepagamento }}"
                                        @if ($loop->first) checked @endif>
                                    @if ($formadepagamento == 'Dinheiro')
                                        <x-dinheiro width="20" height="20" margin="10px" />
                                    @elseif($formadepagamento == 'Pix')
                                        <x-pix width="20" height="20" margin="10px" />
                                    @elseif($formadepagamento == 'Cartão de débito')
                                        <x-cartao-de-depito width="20" height="20" margin="10px" />
                                    @elseif($formadepagamento == 'Cartão de crédito')
                                        <x-cartao_credito width="20" height="20" margin="10px" />
                                    @elseif($formadepagamento == 'Boleto')
                                        <x-boleto width="20" height="20" margin="10px" />
                                    @elseif($formadepagamento == 'Vale-refeição')
                                        <x-vale_refeicao width="20" height="20" margin="10px" />
                                    @endif



                                    <samp>{{ $formadepagamento }}</samp>

                                </div>
                            </li>
                        @endforeach
                    </ul>


                </div>

                <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                    <label for="valor">Valor total</label>


                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <input type="hidden" name="valorTotalAgendamento" id="valorTotalsub"
                            value="{{ $somaValores }}">
                        <input type="text" id="valorTotal" class="form-control campodesablitado"
                            value="{{ number_format($somaValores, 2, ',', '.') }}">


                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 pt-2">
                        <label for="title">Data e horário</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <x-svg_horario width="16" height="16"
                                    title="Digite último horário disponível para esse serviço" />

                            </span>
                            <input type="datetime-local" class="form-control" name="dataHorarioAgendamento"
                                aria-describedby="validationTooltipUsernamePrepend" required />
                            <div class="invalid-tooltip">
                                Por favor, digite Data e horário para o agedamento
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 pt-2">


                        <button type="submit" class="btn btn-info">Agendar</button>










                    </div>



                </div>
            </div>
    </div>
    </form>


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
