@props(['agendamentos' => '', 'empresaAgendamento' => '', 'NomesDasEmpresas' => [],
        'search' => '' , 'searchdate' => '',
        'formaDepagamentoAgendamento' => [],
        'numerosDosPedidos' => [],
])
<div>

    <div class="container">
        <form action="/meus/agendamentos/todos" method="GET" id="searchForm">
            <div class="row">
                <div class="col-md-3 pt-1 ">
                    <x-select-meus-agendamentos nome="Busque pelo nome da empresa" :agendamento="$agendamentos" :value="$NomesDasEmpresas"
                        width="100%" />
                </div>

                <div class="col-md-3 pt-1 ">
                    <x-select-meus-agendamentos nome="Busque pelo N° do pedido" :agendamento="$agendamentos" :value="$numerosDosPedidos"
                        width="100%" />
                </div>

                <div class="col-md-3 pt-1 ">
                    <x-select-meus-agendamentos nome="Busque pela forma de pagamento" :agendamento="$agendamentos" :value="$formaDepagamentoAgendamento"
                        width="100%" />
                </div>




                <div class="col-md-3  pt-1">
                    <x-inpunt-date />
                </div>
            </div>



            @foreach ($empresaAgendamento as $idempresa)
                <input type="hidden" name="idEmpresa[]" value=" {{ encrypt($idempresa->id) }} ">
            @endforeach

        </form>


        <div class="row g-2 pt-2">

            <x-alert-busca-agendamento search="{{ $search }}"
            searchdate="{{ $searchdate }}"
            href="/meus/agendamentos/todos"/>

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
                                            <h6 class="card-text ">Prestadora do serviço:
                                                {{ ucfirst(strtolower($empresa->nomeFantasia)) }}
                                        </div>


                                        </h6>
                                    @endif
                                @endforeach
                            </div>

                            <div class="mb-3 pt-1 ">

                                <div class="input-group">
                                    <span class="input-group-text">N° do pedido</span>
                                    <input type="text" class="form-control campodesablitado"
                                        value="{{ $agendamento->numeroDoPedido }}">


                                </div>
                            </div>

                            <div class="mb-3 pt-1">
                                <h6 class="card-title">Valor total</h6>
                                <div class="input-group">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" class="form-control campodesablitado"
                                        value="{{ number_format($agendamento->valorTotalAgendamento, 2, ',', '.') }}">


                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title">Forma de pagamento</h6>
                                <input type="text" class="form-control campodesablitado"
                                    value="{{ $agendamento->formaDepagamentoAgendamento }}">
                            </div>
                            @if ($agendamento->data_hora_cancelamento_agendamento!== null)

                            <div class="mb-3">
                                <h6 class="card-title">Data do cancelamento </h6>
                                <input type="datetime-local" class="form-control campodesablitado"
                                    id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->data_hora_cancelamento_agendamento }}" />
                            </div>
                            @endif

                            @if ($agendamento->data_hora_finalizacao_agendamento!== null)

                            <div class="mb-3">
                                <h6 class="card-title">Data da finalização </h6>
                                <input type="datetime-local" class="form-control campodesablitado"
                                    id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->data_hora_finalizacao_agendamento }}" />
                            </div>
                            @endif
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataInput = document.getElementById('dataInput');
        const searchForm = document.getElementById('searchForm'); // Adicione um id ao formulário

        dataInput.addEventListener('change', function() {
            searchForm.submit(); // Submete automaticamente o formulário quando a data é alterada
        });
    });
</script>
