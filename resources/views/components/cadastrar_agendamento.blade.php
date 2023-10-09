<div>
    @props(['user_id' => '', 'numeroDopedio' => '', 'empresaimage' => '', 'empresa_razaoSocial' => '',
     'empresa_nomeFantasia' => '', 'dataAtual' => '', 'empresa_logradouro' => '',
      'empresa_numero_endereco' => '', 'empresa_cidade' => '', 'empresa_uf' => '',
      'empresa_telefone' => '', 'empresa_celular' => '', 'user_name' => '', 'user_email' => '',
       'user_phone' => '', 'empresa_id' => '', 'servico' => ' ', 'empresa_formaDePagamento' => ' ',
        'somaValores' => 0, 'servico_imageservico' => '', 'servico_nomeServico' => '', 'servico_id' => '',
        'servico_duracaohoras' => '', 'servico_duracaominutos' => '', 'servico_valorDoServico' => '',
        'idempresa' => '', 'servicoid' => '' , 'encryptedIdunico' => ''
        ])


    <div class="row g-12">





        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <strong>
                        <img src="/img/logo_empresas/{{ $empresaimage }}"
                            class="img-fluid img_logoDadosServicoAgendamentos" alt="{{ $empresa_razaoSocial }}">
                        {{ ucfirst(strtolower($empresa_nomeFantasia)) }}
                    </strong>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <small>Data: {{ $dataAtual }}</small>
                </div>
            </div>
        </div>

        <div class="col-sm-4 invoice-col">


            <address>


                {{ ucfirst(strtolower($empresa_logradouro)) }}
                N° {{ ucfirst(strtolower($empresa_numero_endereco)) }}<br>
                {{ ucfirst(strtolower($empresa_cidade)) }}, {{ $empresa_uf }}<br>
                Telefone: {{ $empresa_telefone }} Celular: {{ $empresa_celular }}<br>

            </address>






        </div>
        <div class="col-sm-4 invoice-col ">


            <strong>{{ ucfirst(strtolower($user_name)) }}


            </strong><br>

            {{ $user_email }}
            Celular: {{ $user_phone }}<br>


        </div>

        <div class="col-sm-4 invoice-col">
            <strong>

                Numero Pedido:
            </strong>

            {{ decrypt($numeroDopedio) }}



        </div>



    </div>

    <div class="row g-12 pt-1" id="tabela">

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
                @if (is_array($servico) || is_object($servico))
                    @foreach ($servico as $servico)
                        <tr class="textagendamento" name="produtos">
                            <td>
                                <img src="/img/logo_servicos/{{ $servico->imageservico }}"
                                    alt="{{ $servico->nomeServico }}" class="imgtabela">
                                {{ $servico->nomeServico }}



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

                            </td>
                            <td>
                                R$ {{ number_format($servico->valorDoServico , 2, ',', '.') }}
                                {{-- melhorar a seguraça --}}
                                <input type="hidden" name="valorUnitatioAgendamento[]"
                                    value="{{ $servico->valorDoServico }}">
                                <?php

                                $encryptedId = encrypt($servico->id);
                                ?>
                                <input type="hidden" name="idServiçoAgendamento[]" value="{{  $encryptedId }}">
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm deleteButton">Remover</a>
                            </td>
                        </tr>
                        @php
                            $somaValores += $servico->valorDoServico;
                        @endphp
                    @endforeach
                @else
                    <tr class="textagendamento" name="produtos">
                        <td>
                            <img src="/img/logo_servicos/{{ $servico_imageservico }}" alt="{{ $servico_nomeServico }}"
                                class="imgtabela">
                            {{ $servico_nomeServico }}


                        </td>
                        <td>
                            @if ($servico_duracaohoras > 1)
                                {{ $servico_duracaohoras }}
                                @if ($servico_duracaohoras == '1')
                                    Hora
                                @else
                                    Horas
                                @endif
                            @endif

                            {{ $servico_duracaominutos }}
                            minutos

                        </td>
                        <td>


                            R$ {{ number_format ($servico_valorDoServico , 2, ',', '.') }}

                            <?php

                            $encryptedIduncio = encrypt($servico_id);
                            ?>
                            {{-- aqui --}}
                            <input type="hidden" name="idServiçoAgendamento[]" value="{{ $encryptedIduncio}}">

                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm deleteButton" id="remover">Remover</a>
                        </td>
                    </tr>
                @endif






            </tbody>





        </table>



        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <h5 class="card-title">Formas de Pagamento</h5>
            <ul id="items-list">
                @foreach ($empresa_formaDePagamento as $formadepagamento)
                    <li>
                        <div class="listadepagamentos">
                            <input id="teste" class="form-check-input" style="margin-right:10px;" type="radio"
                                name="formaDepagamentoAgendamento" value="{{ encrypt($formadepagamento) }}"
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

            @if (is_array($servico) || is_object($servico))
                <label for="valor">Valor total</label>


                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>
                    {{-- melhorar a seguraça --}}
                    <input type="hidden" name="valorTotalAgendamento" id="valorTotalsub" value="{{ $somaValores }}">
                    <input type="text" id="valorTotal" class="form-control campodesablitado"
                        value="{{ number_format($somaValores, 2, ',', '.') }}">


                </div>
            @else
                <label for="valor">Valor total</label>


                <div class="input-group mb-3">
                    <span class="input-group-text">R$</span>

                    <input type="text" name="valorTotalAgendamento" id="valorTotal"
                        class="form-control campodesablitado" value="{{ $servico_valorDoServico }}">


                </div>
            @endif

            <div class="col-lg-12 col-sm-12 col-md-12 pt-2">
                <label for="title">Data e horário</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <x-svg_horario width="16" height="16"
                            title="Digite último horário disponível para esse serviço" />
                    </span>
                    <input type="datetime-local" class="form-control" name="dataHorarioAgendamento"
                        aria-describedby="validationTooltipUsernamePrepend" required min="<?= date('Y-m-d\TH:i'); ?>" />
                    <div class="invalid-tooltip">
                        Por favor, digite Data e horário para o agendamento
                    </div>
                </div>
            </div>




            <div class="col-lg-12 col-sm-12 col-md-12 pt-2">


                <button type="submit" class="btn btn-info">Agendar</button>










            </div>



        </div>
    </div>
    <input type="hidden" name="cadastro_de_empresas_id" value="{{ $idempresa }}">



    <input type="hidden" name="numeroDoPedido" id="numeroDoPedido" class="form-control campodesablitado"
        value=" {{ $numeroDopedio }}">
</div>
