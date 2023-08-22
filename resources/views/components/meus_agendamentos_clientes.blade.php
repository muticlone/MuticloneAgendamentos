@props(['agendamentos' => '', 'empresaAgendamento' => ''])
<div>
    <div class="container">
        <div class="row g-2 pt-2">
            @foreach ($agendamentos as $agendamento)
                <div class="col-lg-4 col-md-6 col-sm-12 pt-2">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top img-fluid" alt="..."> --}}
                        <div class="card-body">
                            <div>
                                @foreach ($empresaAgendamento as $empresa)
                                    @if ($empresa->id === $agendamento->cadastro_de_empresas_id)
                                        <div align="center">
                                            <img src="/img/logo_empresas/{{ $empresa->image }}"
                                                class="img_meus_agedamentos  mx-2" alt="{{ $empresa->nomeFantasia }}">
                                        </div>
                                        <div class="pt-2">
                                            <h6 class="card-text ">Prestadora do serviço
                                                {{ ucfirst(strtolower($empresa->nomeFantasia)) }}
                                        </div>


                                        </h6>
                                    @endif
                                @endforeach
                            </div>

                            <div class="mb-3 pt-2">
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

                            <x-status-agendamento agendamento_confirmado="{{ $agendamento->confirmado }}"
                                agendamento_finalizado="{{ $agendamento->finalizado }}"
                                agendamento_cancelado="{{ $agendamento->cancelado }}" />


                            @if ($agendamento->confirmado == 0 && $agendamento->cancelado == 0)
                                <x-btn_detalhes cor="warning" id="{{ $agendamento->id }}" />
                            @elseif ($agendamento->finalizado == 1 && $agendamento->cancelado == 0)
                                @if ($agendamento->nota && $agendamento->comentario)
                                    <x-btn_detalhes cor="success" id="{{ $agendamento->id }}" />
                                @else
                                    <x-btn_detalhes nome="Avaliar" cor="warning" id="{{ $agendamento->id }}" />
                                @endif
                            @elseif ($agendamento->confirmado == 1 && $agendamento->cancelado == 0)
                                <x-btn_detalhes cor="info" id="{{ $agendamento->id }}" />
                            @elseif ($agendamento->cancelado == 1)
                                <x-btn_detalhes cor="danger" id="{{ $agendamento->id }}" />
                            @endif





                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>
