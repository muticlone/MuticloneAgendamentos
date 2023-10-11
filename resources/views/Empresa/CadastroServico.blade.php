@extends('Layout.main')

@section('title', 'Cadastrar Empresa')

@section('conteudo')

    <div class="col-md-8 offset-md-2 pt-5">

        <form action="/cadastrar/servico/{{ $empresa->id }}" method="POST" enctype="multipart/form-data"
            class="row g-3 needs-validation" novalidate>
            @csrf

            <div class="row g-12">

                <div class="col-lg-12 col-sm-12 col-md-12" align="center">
                    <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_edit"
                        alt="{{ $empresa->razaoSocial }}">
                </div>
                <div class="pt-2">
                    <div class="alert alert-light" role="alert" align="center">
                        Cradastrar novo serviço {{ strtolower($empresa->nomeFantasia) }}
                    </div>
                </div>
                {{-- imagem para o serviço --}}
                <div class="form-group">
                    <label for="formFile" class="form-label">Adicionar uma imagem para o serviço:</label>
                    <input class="form-control" type="file" id="imageservico" name="imageservico" required>

                </div>

                {{-- nome do serviço --}}
                <div class="col-lg-8 col-sm-12 col-md-12 pt-2">
                    <label for="title">

                        Nome


                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <x-svg_caixas width="16" height="16" title="Digite Nome do serviço" />


                        </span>
                        <input type="text" class="form-control" id="nomeservico" name="nomeServico"
                            placeholder="Nome do serviço" maxlength="25" minlength="3"
                            aria-describedby="validationTooltipUsernamePrepend" required />
                        <div class="invalid-tooltip">
                            Por favor, digite o nome do serviço de no minimo três caracteres

                        </div>
                    </div>

                </div>

                {{-- valor do serviço --}}
                <div class="col-lg-4 col-sm-12 col-md-12 pt-2">
                    <label for="title">Valor</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <x-dinheiro width="16" height="16" />
                        </span>

                        <input type="text" class="form-control" id="valorDoServico" name="valorDoServico"
                            placeholder="Valor" aria-describedby="validationTooltipUsernamePrepend"
                            inputmode="numeric"
                            required />
                        <div class="invalid-tooltip">
                            Por favor, digite o valor do serviço
                        </div>
                    </div>

                </div>



                {{-- horário inicial para o atendimento --}}
                <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                    <label for="title">horário inicial para o atendimento </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <x-svg_horario width="16" height="16"
                                title="Digite o horário de início do atendimento para esse serviço" />

                        </span>
                        <input type="time" class="form-control" name="horario_incial_atedimento"
                            aria-describedby="validationTooltipUsernamePrepend" required value="08:00"/>
                        <div class="invalid-tooltip">
                            Digite o horário de início do atendimento para esse serviço
                        </div>
                    </div>
                </div>

                {{-- horário final para o atendimento --}}
                <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                    <label for="title">horário final de atendimento</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <x-svg_horario width="16" height="16"
                                title="Digite último horário disponível para esse serviço" />

                        </span>
                        <input type="time" class="form-control" name="horario_final_atedimento"
                            aria-describedby="validationTooltipUsernamePrepend" required value="18:00"/>
                        <div class="invalid-tooltip">
                            Por favor, digite último horário disponível para esse serviço
                        </div>
                    </div>
                </div>

                {{-- Duração estimada: --}}

                <label for="duracao">Duração estimada </label>
                <div class="row">

                    <div class="col-lg-4 col-sm-12 col-md-12 pt-1">
                        <select class="form-select" id="horas" name="duracaohoras" required>
                            <option value="0">Horas</option>
                            <option value="1">1 hora</option>
                            <option value="2">2 horas</option>
                            <option value="3">3 horas</option>
                            <option value="4">4 horas</option>
                            <option value="5">5 horas</option>
                            <option value="6">6 horas</option>
                            <option value="7">7 horas</option>
                            <option value="8">8 horas</option>
                            <option value="9">9 horas</option>
                            <option value="10">10 horas</option>
                            <option value="11">11 horas</option>
                            <option value="12">12 horas</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-12 pt-1">
                        <select class="form-select" id="minutos" name="duracaominutos" required>
                            <option value="">Minutos</option>
                            <option value="5">5 minutos</option>
                            <option value="10">10 minutos</option>
                            <option value="15">15 minutos</option>
                            <option value="20">20 minutos</option>
                            <option value="30">30 minutos</option>
                            <option value="35">35 minutos</option>
                            <option value="40">40 minutos</option>
                            <option value="45">45 minutos</option>
                            <option value="50">50 minutos</option>
                            <option value="51">50 minutos</option>
                            <!-- Adicione mais opções de minutos conforme necessário -->
                        </select>
                    </div>
                </div>




                {{-- Descrição --}}
                <div class="col-lg-12 col-sm-12 col-md-12 pt-3 ">
                    <label for="exampleFormControlTextarea1" class="form-label">Descrição </label>
                    <div class="form-group">

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <x-svg_descricao width="16" height="16"
                                    title="Digite uma descrição sobre o serviço" />


                            </span>
                            <textarea class="form-control" name="descricaosevico" id="resutservico" rows="3"
                                placeholder="Descrição sobre seu negócio" minlength="15" maxlength="131"
                                aria-describedby="validationTooltipUsernamePrepend" required></textarea>
                            <div class="invalid-tooltip ">
                                Por favor, digite uma breve descrição sobre o serviço de mo minimo quize caracteres

                            </div>
                        </div>


                    </div>
                    {{-- <button type="button" class="btn btn-success" id="generateDescriptionSevico"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Digite nome do serviço, depois gere aqui uma descrição automática para o seu serviço">
                        <span id="nomeDesciservico" style="margin-right: 10px;">Gere uma descrição</span>
                        <span id="loadingMessageservico" style="display: none;" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>

                    </button> --}}
                </div>



            </div>




    </div>

    <div class="col-lg-12 col-sm-12 col-md-12 pt-2  "align="center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>

    </form>


    </div>

    <script src="/js/gbtCadastroServico.js"></script>
    <script src="/js/Tooltips.js"></script>

    <script>
        $(document).ready(function() {
          $('#valorDoServico').inputmask({
            alias: 'numeric',
            rightAlign: false,
            radixPoint: ',',
            groupSeparator: '.',
            autoGroup: true,
            digits: 2,
            digitsOptional: false,
            placeholder: '0',
            allowMinus: false,
            prefix: 'R$ ',
            clearMaskOnLostFocus: false // Mantém a máscara após perder o foco
          });
        });
        </script>


@endsection
