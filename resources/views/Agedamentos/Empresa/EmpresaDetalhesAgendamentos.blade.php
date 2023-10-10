@extends('Layout.main')

@section('title', $user->name)

@section('conteudo')
    <div class="pt-1">
        <x-menu_agendamentos empresa_id="{{ $empresa->id }}" />
    </div>
    <div class="col-md-12 offset-md-0 pt-3">

        <div class="row g-12">


            <div class="card">
                <div class="card-header">


                    N° do pedido: {{ $agendamento->numeroDoPedido }}

                    <input type="hidden" id="nome" value="{{ $user->name }}">
                </div>
                @php
                    $contador = 0;
                @endphp
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 d-flex">

                                <strong>
                                    <img src="/img/logo_empresas/{{ $empresa->image }}"
                                        class="img-fluid img_logoDadosServicoAgendamentos"
                                        alt="{{ $empresa->razaoSocial }}">

                                    {{ ucfirst(strtolower($empresa->nomeFantasia)) }}
                                    <div class="pt-2">
                                        <h6> Cliente: {{ $user->name }}</h6>
                                        <h6> Numero: {{ $user->phone }}</h6>
                                        <h6> E-mail: {{ $user->email }}</h6>
                                    </div>


                                </strong>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <small>Data: {{ $agendamento->created_at->format('d/m/Y H:i:s') }}</small>
                            </div>
                        </div>
                    </div>





                    @php
                        $somaminutos = 0;
                        $somahoras = 0;

                    @endphp

                    @foreach ($agendamento->duracaominutosAgendamento as $minutos)
                        @php
                            $somaminutos += $minutos;
                        @endphp
                    @endforeach
                    @foreach ($agendamento->duracaohorasAgendamento as $horas)
                        @php
                            $somahoras += $horas;
                        @endphp
                    @endforeach

                    <div class=" produtosDetalhesAgendamentos" id="carrinho">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Duração</th>
                                </tr>
                            </thead>

                            @foreach ($agendamento->nomeServiçoAgendamento as $index => $nome)
                                @php
                                    $valorun = $agendamento->valorUnitatioAgendamento[$index] ?? null;
                                    $duracaohoras = $agendamento->duracaohorasAgendamento[$index] ?? null;
                                    $duracaominutos = $agendamento->duracaominutosAgendamento[$index] ?? null;
                                    $contador++;
                                @endphp
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $nome }}</td>
                                        <td>R$ {{ $valorun }}</td>
                                        <td>
                                            @if ($duracaohoras > 0)
                                                {{ $duracaohoras }} Horas
                                            @endif

                                            {{ $duracaominutos }} Minutos
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach
                        </table>


                    </div>



                    @if (!$agendamento->cancelado == 1)
                        <p class="card-text">
                            Duração total:
                            {{ $somahoras }} horas
                            {{ $somaminutos }} minutos

                        </p>
                    @endif




                    <p>Quantidade: {{ $contador }} produtos</p>




                    <div class="row g-12">
                        @if (!$agendamento->cancelado == 1)


                            <div class="col-lg-3 col-sm-12 col-md-12 pt-2">
                                @if ($agendamento->finalizado == 1)
                                    <h6 class="card-title">Valor Pago </h6>
                                @else
                                    <h6 class="card-title">Valor total à pagar </h6>
                                @endif

                                <div class="input-group mb-3">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" class="form-control campodesablitado"
                                        value="{{ number_format($agendamento->valorTotalAgendamento, 2, ',', '.') }}">

                                </div>

                            </div>
                            <div class="col-lg-3 col-sm-12 col-md-12 pt-2">

                                <h6 class="card-title">Forma de pagamento</h6>
                                <input type="text" class="form-control campodesablitado"
                                    value="{{ $agendamento->formaDepagamentoAgendamento }}">
                            </div>
                        @endif
                        <div class="col-lg-3 col-sm-12 col-md-12 pt-2">
                            <form id="FormReagendar" action="/reagendar/{{ $agendamento->id }}" method="POST">
                                @csrf
                                @method('PUT')

                                <h6 class="card-title">Data do agendamento</h6>
                                <input type="datetime-local" class="form-control  campodesablitado"
                                    id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->dataHorarioAgendamento }}" required />
                            </form>
                        </div>

                        @if ($agendamento->finalizado == 1)
                            <div class="col-lg-3 col-sm-12 col-md-12 pt-2">


                                <h6 class="card-title">Data da finalização</h6>
                                <input type="datetime-local" class="form-control  campodesablitado"
                                    id="dataHorarioAgendamentofinalizacao" name="dataHorarioAgendamentofinalizacao"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->data_hora_finalizacao_agendamento }}" required />

                            </div>
                        @endif
                        @if ($agendamento->cancelado == 1)
                            <div class="col-lg-3 col-sm-12 col-md-12 pt-2">


                                <h6 class="card-title">Data do Cancelamento</h6>
                                <input type="datetime-local" class="form-control  campodesablitado"
                                    id="dataHorarioAgendamentofinalizacao" name="dataHorarioAgendamentofinalizacao"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->data_hora_cancelamento_agendamento }}" required />

                            </div>
                        @endif


                        <x-status-agendamento agendamento_confirmado="{{ $agendamento->confirmado }}"
                            agendamento_finalizado="{{ $agendamento->finalizado }}"
                            agendamento_cancelado="{{ $agendamento->cancelado }}" />

                        </br>






                    </div>



                    <x-btn-agendamento-detalhes agendamento_confirmado="{{ $agendamento->confirmado }}"
                        agendamento_finalizado="{{ $agendamento->finalizado }}" agendamento_id="{{ $agendamento->id }}"
                        agendamento_cancelado="{{ $agendamento->cancelado }}"
                        agendamento_motivoCancelamento="{{ $agendamento->motivoCancelamento }}"
                        agendamento_dataHorarioAgendamento="{{ $agendamento->dataHorarioAgendamento }}" />


                    @if ($agendamento->finalizado == 1)
                        @if (!is_null($agendamento->nota))
                            <div class="row g-12">
                                <label for="input-6"> Avaliação do Agendamento: </label>

                                <div class="col-lg-12 col-sm-12 col-md-12 pt-2">


                                    <input id="input-6" name="input-6" class="rating rating-loading pt-br"
                                        value="{{ $agendamento->nota }}" data-min="0" data-max="5" data-step="0.1"
                                        data-size="xs" data-readonly="true" data-show-clear="false">


                                </div>
                                <label for="input-6"> Avaliação do produto: </label>
                                <div class="col-lg-12 col-sm-12 col-md-12 pt-2 produtosDetalhesAgendamentos">
                                    @foreach ($dados as $dado)
                                        {{ $dado['nome'] }}
                                        <input id="input-6_{{ $dado['idsevico'] }}" name="notaservico[]"
                                            class="rating rating-loading pt-br" value="{{ $dado['nota'] }}" data-min="0"
                                            data-max="5" data-step="0.1" data-size="xs" data-readonly="true"
                                            data-show-clear="false">





                                        <input type="hidden" name="idservico[]"
                                            value="{{ encrypt($dado['idsevico']) }}">
                                    @endforeach
                                </div>
                                <p>Nome do cliente :
                                    {{ $user->name }}

                                </p>

                                <p>

                                    Comentario:
                                    {{ $agendamento->comentario }}

                                </p>
                            </div>
                        @else
                            <h6>Seu cliente ainda não avaliou agendamento</h6>
                        @endif


                    @endif







                </div>
            </div>
        </div>



        <script src="/js/Atualizar.js"></script>



    @endsection
