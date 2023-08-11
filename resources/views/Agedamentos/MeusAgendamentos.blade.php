@extends('Layout.main')

@section('title', 'Meus Agendamentos')

@section('conteudo')

    <div class="col-md-12 offset-md-0 pt-3">
        <div class="row g-12">


            <div class="col-12 pt-1 ">
                <div class="alert alert-light" role="alert" align="center">
                    Meus Agendamentos
                </div>
            </div>

            @foreach ($agendamentos as $agendamento)
                <div class="col-auto pt-2">
                    <div class="card card_meus_agendamentos"
                        style="min-width:300px; min-height:190px; max-width:300px; max-height:190px;">
                        <div class="card-body txt">
                            @foreach ($empresaAgendamento as $empresa)
                                @if ($empresa->id === $agendamento->cadastro_de_empresas_id)
                                    <img src="/img/logo_empresas/{{ $empresa->image }}" class="img_meus_agedamentos"
                                        alt="">
                                    <p class="card-text  nomeAgendamentos">Empresa: {{ $empresa->nomeFantasia }}</p>
                                @endif
                            @endforeach

                            <p class="card-text  nomeAgendamentos">R$ {{ $agendamento->valorTotalAgendamento }}</p>
                            <p class="card-text  nomeAgendamentos">Forma de pagamento:
                                {{ $agendamento->formaDepagamentoAgendamento }}</p>
                            <p class="card-text  nomeAgendamentos">Data do agendamento: </p>
                            <p class="card-text  nomeAgendamentos">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $agendamento->dataHorarioAgendamento)->format('d/m/Y H:i:s') }}
                            </p>
                            <p class="card-text  nomeAgendamentos">Status: aguardando confirmar</p>
                            <a href="{{ route('meus.agendamentosdetalhes', ['id' => $agendamento->id]) }}" class="btn btn-sm btn-info nomeAgendamentos">Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="paginaçãoRodape ">
                <x-pagination :paginatedItems="$agendamentos" />
            </div>




        </div>


    </div>


@endsection
