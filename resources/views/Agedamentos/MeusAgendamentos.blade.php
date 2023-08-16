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
            <div class="col-lg-4 col-md-6 col-sm-12 pt-2">
                <div class="card">
                    {{-- <img src="..." class="card-img-top img-fluid" alt="..."> --}}
                    <div class="card-body">
                        <div>
                        @foreach ($empresaAgendamento as $empresa)
                        @if ($empresa->id === $agendamento->cadastro_de_empresas_id)
                            <div align ="center">
                                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img_meus_agedamentos  mx-2"
                                alt="{{ $empresa->nomeFantasia }}">
                            </div>
                            <div class="pt-2">
                                <h6 class="card-text ">Prestadora do serviço {{ ucfirst(strtolower($empresa->nomeFantasia)) }}
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
                            <input type="datetime-local" class="form-control campodesablitado" id="dataHorarioAgendamento"
                                name="dataHorarioAgendamento" aria-describedby="validationTooltipUsernamePrepend"
                                value="{{ $agendamento->dataHorarioAgendamento }}" />
                        </div>

                        <p>Status: aguardando confirmar</p>

                        <a href="{{ route('meus.agendamentosdetalhes', ['id' => $agendamento->id]) }}" class="btn btn-primary position-relative">
                            Detalhes
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                5
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

                <x-pagination :paginatedItems="$agendamentos" />






        </div>


    </div>


@endsection
