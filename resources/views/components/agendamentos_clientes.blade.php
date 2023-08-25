<div>
    @props(['clienteagendamento' => '', 'empresa_nomeFantasia' => '', 'empresa_id' => ''])

    <div class="container">
        <div class="row g-2 pt-2">

            @foreach ($clienteagendamento as $agendamento)
                <div class="col-lg-4 col-md-6 col-sm-12 pt-2">

                    <div class="card">

                        <div class="card-body">
                            <div class="mb-3">

                                <div class="mb-3">

                                    <div class="input-group">
                                        <span class="input-group-text">N° do pedido</span>
                                        <input type="text" class="form-control campodesablitado"
                                            value="{{ $agendamento->numeroDoPedido }}">
                                    </div>
                                </div>



                                <h6 class="card-title">Cliente: {{ $agendamento->user->name }}</h6>
                                <div class="row g-2">


                                    <div class="col-8">
                                        <p>Contato: {{ $agendamento->user->phone }}</p>
                                    </div>

                                    @php
                                        $numeroLimpo = preg_replace('/[^0-9]/', '', $agendamento->user->phone);

                                    @endphp
                                    <div class="col-4">
                                        <a href="https://wa.me/55{{ $numeroCelular = str_replace(['-', ' '], '', $numeroLimpo) }}?text=Ol%C3%A1%21%20{{ $agendamento->user->name }},%20estou%20entrando%20em%20contato%20a%20respeito%20do%20seu%20agendamento%20na%20{{ ucfirst(strtolower($empresa_nomeFantasia)) }}"
                                            class="btn btn-success btn-sm vertical-align-middle" target="_blank">
                                            <x-svg-Whatsapp width="20" height="20" margin="2px" />
                                            Whatsapp
                                        </a>
                                    </div>


                                </div>

                            </div>


                            <div class="mb-3">
                                <h6 class="card-title">Valor total</h6>
                                <div class="input-group">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" class="form-control campodesablitado"
                                        value="{{ $agendamento->valorTotalAgendamento }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title">Forma de pagamento</h6>
                                <input type="text" class="form-control campodesablitado"
                                    value="{{ $agendamento->formaDepagamentoAgendamento }}">
                            </div>

                            <div class="mb-3">
                                <h6 class="card-title">Data do agendamento</h6>
                                <input type="datetime-local" class="form-control campodesablitado"
                                    id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->dataHorarioAgendamento }}" />
                            </div>

                            <x-status-agendamento agendamento_confirmado="{{ $agendamento->confirmado }}"
                                agendamento_finalizado="{{ $agendamento->finalizado }}"
                                agendamento_cancelado="{{ $agendamento->cancelado }}" />



                            @if ($agendamento->confirmado == 0 && $agendamento->cancelado == 0)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('meus.clientes.agendamentosdetalhes', ['id' => $agendamento->id, 'idEmpresa' => $empresa_id]) }}"
                                   class="btn btn-warning position-relative d-inline-flex align-items-center">
                                    Detalhes
                                    <span class="badge rounded-pill bg-danger ms-2">5</span>
                                </a>

                                <form action="/confirmar{{ $agendamento->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" id="ConfirmarAgendamento" class="btn btn-success btntamanhoMeusClientesAgendamentoDetalhes">
                                        Confirmar
                                    </button>
                                </form>
                            </div>


                            @elseif ($agendamento->finalizado == 1 && $agendamento->cancelado == 0)
                                <a href="{{ route('meus.clientes.agendamentosdetalhes', ['id' => $agendamento->id, 'idEmpresa' => $empresa_id]) }}"
                                    class="btn btn-success position-relative">Detalhes
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        5
                                    </span>
                                </a>
                            @elseif ($agendamento->confirmado == 1 && $agendamento->cancelado == 0)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('meus.clientes.agendamentosdetalhes', ['id' => $agendamento->id, 'idEmpresa' => $empresa_id]) }}"
                                    class="btn btn-info position-relative">Detalhes
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        5
                                    </span>
                                </a>
                                <form action="/finalizar{{ $agendamento->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="display: block;" id="FinalizarAgendamento"
                                        class="btn btn-success btntamanhoMeusClientesAgendamentoDetalhes  mx-1 ">
                                        Finalizar
                                    </button>
                                </form>
                            </div>
                            @elseif ($agendamento->cancelado == 1)
                            <a href="{{ route('meus.clientes.agendamentosdetalhes', ['id' => $agendamento->id, 'idEmpresa' => $empresa_id]) }}"
                                class="btn btn-danger position-relative">Detalhes
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                   1
                                </span>
                            </a>
                            @endif



                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>






</div>
