@extends('Layout.main')

@section('title', $user->name)

@section('conteudo')
    <div class="col-md-12 offset-md-0 pt-3">
        <div class="row g-12">
            <div class="card ">
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




                    <p class="card-text">
                        Duração total:
                        {{ $somahoras }} horas
                        {{ $somaminutos }} minutos

                    </p>




                    <p>Quantidade: {{ $contador }} produtos</p>




                    <div class="row g-12">
                        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
                            <h5 class="card-title">Valor total à pagar </h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control campodesablitado"
                                    value="{{ number_format($agendamento->valorTotalAgendamento, 2, ',', '.') }}">

                            </div>

                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
                            <h5 class="card-title">Forma de pagamento</h5>
                            <input type="text" class="form-control campodesablitado"
                                value="{{ $agendamento->formaDepagamentoAgendamento }}">
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
                            <h5 class="card-title">Data do agendamento</h5>
                            <input type="datetime-local" class="form-control  campodesablitado" id="dataHorarioAgendamento"
                                name="dataHorarioAgendamento" aria-describedby="validationTooltipUsernamePrepend"
                                value="{{ $agendamento->dataHorarioAgendamento }}" />
                        </div>
                        @if ($agendamento->confirmado == 0)
                            <p class="card-text">Status: aguardando confirmar</p>
                        @elseif ($agendamento->finalizado == 1)
                            <p class="card-text">Status: Finalizado</p>
                        @elseif ($agendamento->confirmado == 1)
                            <p class="card-text">Status: Confirmado</p>
                        @endif

                        </br>
                        {{-- <div class="col-12 d-flex justify-content-end align-items-center">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                                </svg>
                            </a>
                        </div> --}}


                        <div class="col-12 pt-2">
                            <textarea class="form-control" style="display: none;" name="motivoCacelamento" id="motivoCacelamento" cols="50"
                                placeholder="Digite o motivo do cancelamento" minlength="50" maxlength="250" rows="3"></textarea>
                        </div>



                        <div class="col-12 pt-5" id="reagendar" align="center">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                @if ($agendamento->confirmado == 0)
                                    <form action="/confirmar{{ $agendamento->id }}" method="POST">
                                        @csrf
                                        @method('PUT')


                                        <button type="submit" id="ConfirmarAgendamento" style="display: block;"
                                            class="btn btn-success btnDetalhes"> Confirmar </button>

                                    </form>

                                    <button type="submit" id="reagendarAgendamento" style="display: block;"
                                        class="btn btn-info btnDetalhes"> Reagendar </button>
                                    <a style="display: none;" id="voltar" class="btn btn-info btnDetalhes">Voltar</a>


                                    <button type="submit" id="cancelarAgendamento" style="display: block;"
                                        class="btn btn-danger btnDetalhes"> Cancelar </button>
                                    <a style="display: none;" id="cancelaracao"
                                        class="btn btn-danger btnDetalhes">Cancelar</a>
                                @else
                                    @if ($agendamento->finalizado == 0)
                                        <form action="/finalizar{{ $agendamento->id }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <button type="submit" id="FinalizarAgendamento" style="display: block;"
                                                class="btn btn-success btnDetalhes"> Finalizar </button>

                                        </form>
                                        <button type="submit" id="reagendarAgendamento" style="display: block;"
                                            class="btn btn-info btnDetalhes"> Reagendar </button>
                                        <a style="display: none;" id="voltar" class="btn btn-info btnDetalhes">Voltar</a>


                                        <button type="submit" id="cancelarAgendamento" style="display: block;"
                                            class="btn btn-danger btnDetalhes"> Cancelar </button>
                                    @else
                                        @if (!is_null($agendamento->nota))
                                            <div class="row g-12">
                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <label for="input-6"> Avaliação do cliente</label>
                                                    <input id="input-6" name="input-6"
                                                        class="rating rating-loading pt-br"
                                                        value="{{ $agendamento->nota }}" data-min="0" data-max="5"
                                                        data-step="0.1" data-readonly="true" data-show-clear="false">

                                                </div>

                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                    <p>
                                                        {{ $user->name }}:
                                                        {{ $agendamento->comentario }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif


                                    @endif





                                @endif


                            </div>

                        </div>

                    </div>
                </div>









            </div>
        </div>
    </div>





@endsection