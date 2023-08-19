@extends('Layout.main')

@section('title', 'Meus clientes')

@section('conteudo')

    <div class="col-12 pt-1 ">
        <div class="alert alert-light" role="alert" align="center">
            Atendimento agendado
        </div>

        <div class="row g-2 pt-2">

            @foreach ($clienteagendamento as $agendamento)
                <div class="col-lg-4 col-md-6 col-sm-12 pt-2">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top img-fluid" alt="..."> --}}
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
                                        <a href="https://wa.me/55{{ $numeroCelular = str_replace(['-', ' '], '', $numeroLimpo) }}?text=Ol%C3%A1%21%20{{ $agendamento->user->name }},%20estou%20entrando%20em%20contato%20a%20respeito%20do%20seu%20agendamento%20na%20{{ ucfirst(strtolower($empresa->nomeFantasia)) }}"
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
                                <h6 class="card-title">Data do agendamento</h6>
                                <input type="datetime-local" class="form-control campodesablitado"
                                    id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->dataHorarioAgendamento }}" />
                            </div>

                            @if ($agendamento->confirmado == 0)
                                <p class="card-text">Status: aguardando confirmar</p>
                            @elseif ($agendamento->finalizado == 1)
                                <p class="card-text">Status: Finalizado</p>
                            @elseif ($agendamento->confirmado == 1)
                                <p class="card-text">Status: Confirmado</p>
                            @endif


                            <a href="{{ route('meus.clientes.agendamentosdetalhes', ['id' => $agendamento->id, 'idEmpresa' => $empresa->id]) }}"
                                class="btn btn-primary position-relative">Detalhes
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    5
                                </span>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <x-pagination :paginatedItems="$clienteagendamento" />





    @endsection
