@extends('Layout.main')

@section('title', 'Agendar')

@section('conteudo')

    <div class="col-md-8 offset-md-2 pt-2">
        <div class="pt-2">
            <div class="alert alert-light" role="alert" align="center">
                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_logoDadosServicoAgendamentos"
                    alt="{{ $empresa->razaoSocial }}">
                </br>
                Agendamento {{ strtolower($empresa->nomeFantasia) }}


            </div>

            <form action="{{ route('cadastrar.agendamentoProdutouncio') }}" method="POST">

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
                                        <a class="btn btn-danger btn-sm deleteButton" id="remover">Remover</a>
                                    </td>
                                </tr>



                            </tbody>





                        </table>



                        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                            <h5 class="card-title">Formas de Pagamento</h5>
                            <ul id="items-list">
                                @foreach ($empresa->formaDePagamento as $formadepagamento)
                                    <li>
                                        <div class="listadepagamentos">
                                            <input id="teste" class="form-check-input" style="margin-right:10px;"
                                                type="radio" name="formaDepagamentoAgendamento"
                                                value="{{ $formadepagamento }}"
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

                                <input type="text" name="valorTotalAgendamento" id="valorTotal" class="form-control campodesablitado"
                                    value="{{ $servico->valorDoServico }}">


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

                                <input type="hidden" name="cadastro_de_empresas_id" value="{{ $empresa->id }}">
                                <button type="submit" class="btn btn-info">Agendar</button>










                            </div>



                        </div>
                    </div>




            </form>
        </div>
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
