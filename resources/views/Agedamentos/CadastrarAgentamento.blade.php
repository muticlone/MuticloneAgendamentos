@extends('Layout.main')

@section('title', 'Carrinho')

@section('conteudo')


    @php
        $somaValores = 0;
    @endphp

    <div class="col-md-9 offset-md-1 pt-2">
        <div class="pt-2">
            
            <div class="alert alert-light" role="alert" align="center">
                <img src="/img/logo_empresas/{{ $empresa->image }}"
                class="img-fluid  img_logoDadosServicoAgendamentos" alt="{{ $empresa->razaoSocial }}">
            </br>
                Agendamento {{ strtolower($empresa->nomeFantasia) }}
          
               
            </div>
        </div>

        <form action="/cadastrar/agentamento" method="POST">
            @csrf
            <input type="hidden" name="empresaid" value="{{ $empresa->id }}">

            <div class="row g-12 ">
                <table class="table  table-hover">
                    <thead>
                        <tr class="tituloagendamento">
                            <th scope="col">Produto</th>
                            <th scope="col">Duração</th>

                            <th scope="col">Valor un</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servico as $servico)
                            <tr class="textagendamento" name="produtos">
                                <td>
                                    <img src="/img/logo_servicos/{{ $servico->imageservico }}" alt="{{ $servico->nomeServico }}"
                                    class="imgtabela">
                                    {{ $servico->nomeServico }}

                                    <input type="hidden" name="nomeServiçoAgendamento[]"
                                        value="{{ $servico->nomeServico }}">
                                    <input type="hidden" name="idServiçoAgendamento[]" value="{{ $servico->id }}">
                                </td>
                                <td>
                                    {{ $servico->duracaohoras }}
                                    @if ($servico->duracaohoras == '1')
                                        Hora
                                    @else
                                        Horas
                                    @endif
                                    {{ $servico->duracaominutos }}
                                    minutos
                                    <input type="hidden" name="duracaohorasAgendamento[]"
                                        value="{{ $servico->duracaohoras }}">
                                    <input type="hidden" name="duracaominutosAgendamento[]"
                                        value="{{ $servico->duracaominutos }}">
                                </td>


                                <td>R$ {{ $servico->valorDoServico }}
                                    <input type="hidden" name="valorUnitatio[]" value="{{ $servico->valorDoServico }}">
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
                                        name="formaDepagamento" value="{{ $formadepagamento }}"
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

                    <script>
                        // Evento de clique nos inputs
                        var inputs = document.querySelectorAll('input[name="FormaDepagamento"]');
                        inputs.forEach(function(input) {
                            input.addEventListener('click', function() {
                                var selectedValue = this.value;
                                // Faça algo com o valor selecionado
                                console.log(selectedValue);
                            });
                        });

                        $(document).ready(function() {
                            $('#valorTotal').on('keydown paste', function(e) {
                                e.preventDefault();
                            });
                        });
                    </script>








                </div>

                <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                    <label for="valor">Valor total</label>


                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <input type="text" name="valorTotal" id="valorTotal" class="form-control"
                            value="{{ $somaValores }}">

                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 pt-2">
                    <label for="title">Data e horário</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> 
                            <x-svg_horario width="16" height="16" 
                            title="Digite último horário disponível para esse serviço" />
                            
                        </span>
                        <input type="datetime-local" class="form-control" name="horario_final_atedimento"
                        aria-describedby="validationTooltipUsernamePrepend"
                        required/>
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







@endsection
