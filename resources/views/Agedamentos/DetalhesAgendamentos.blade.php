@extends('Layout.main')


@section('title', 'Detalhes Agendamento')

@section('conteudo')







    <div class="col-md-10 offset-md-1 pt-1 ">
        <div class="row g-12">

            {{-- <div class="col-12 pt-1 ">
                <div class="alert alert-light" role="alert" align="center">
                    Atendimento agendado
                </div>
            </div> --}}




            <div class="col-lg-12 col-sm-12 col-md-12 pt-2">
                <form action="{{ route('home') }}" method="get">


                    @foreach ($agendamentos as $agendamento)
                        <div class="card ">
                            <div class="card-header">


                                N° do pedido: {{ $agendamento->numeroDoPedido }}

                                <input type="hidden" id="nome" value="{{ $user->name }}">
                            </div>
                            @php
                                $contador = 0;
                            @endphp
                            <div class="card-body">
                                <h6> Cliente: {{ $user->name }}</h6>

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


                                <p class="card-text">
                                    Duração total:
                                    {{ $somahoras }} horas
                                    {{ $somaminutos }} minutos

                                </p>


                                <div class="card-body produtosDetalhesAgendamentos" id="carrinho">

                                    <p class="card-text ">
                                        @foreach ($agendamento->nomeServiçoAgendamento as $index => $nome)
                                            @php
                                                $valorun = $agendamento->valorUnitatioAgendamento[$index] ?? null;
                                                $duracaohoras = $agendamento->duracaohorasAgendamento[$index] ?? null;
                                                $duracaominutos = $agendamento->duracaominutosAgendamento[$index] ?? null;
                                                $contador++;
                                            @endphp

                                            <p class="card-text linha ">
                                                Produto: {{ $nome }} </br>
                                                Valor: R$ {{ $valorun }} </br>
                                                Duração:
                                                @if ($duracaohoras > 0)
                                                    {{ $duracaohoras }} Horas
                                                @endif

                                                {{ $duracaominutos }} Minutos

                                            </p>

                                            </br>
                                        @endforeach


                                    </p>
                                </div>
                                </br>
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
                                        <input type="datetime-local" class="form-control  campodesablitado"
                                            id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                            aria-describedby="validationTooltipUsernamePrepend"
                                            value="{{ $agendamento->dataHorarioAgendamento }}" />
                                    </div>
                                    <p class="card-text">Status: aguardando confirmar</p>
                                    <div class="col-12">
                                        <textarea class="form-control" style="display: none;" name="motivoCacelamento" id="motivoCacelamento" cols="50"
                                            placeholder="Digite o motivo do cancelamento" minlength="50" maxlength="250" rows="3"></textarea>
                                    </div>



                                    <div class="col-lg-6 col-sm-12 col-md-12 pt-2" id="reagendar">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <button type="submit" id="reagendarAgendamento" style="display: block;"
                                                class="btn btn-info"> Reagendar </button>
                                            <a style="display: none;" id="voltar" class="btn btn-info">Voltar</a>


                                            <button type="submit" id="cancelarAgendamento" style="display: block;"
                                                class="btn btn-danger"> Cancelar agendamento </button>
                                            <a style="display: none;" id="cancelaracao" class="btn btn-danger">Cancelar</a>
                                        </div>

                                    </div>

                                </div>
                            </div>









                        </div>
            </div>
            @endforeach
            </form>
        </div>

        <div class="row g-12">
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">


                @foreach ($empresa as $empresaItem)
                    <div>
                        <div class="card">


                            <div class="card-body">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.!2d0!3d0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7463b12bfda1035%3A0x373937af9e59ad56!2s{{ $empresaItem['logradouro'] }}%20%2C%20{{ $empresaItem['numero_endereco'] }}%20-%20{{ $empresaItem['bairro'] }}%2C%20{{ $empresaItem['cidade'] }}%20-%20{{ $empresaItem['uf'] }}%2C%2045065-000!5e0!3m2!1spt-BR!2sbr!4v1675985984301!5m2!1spt-BR!2sbr"
                                    width="100%" height="100%" style="border: 0; border-radius: 10px;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


                                <h5 class="vertical-align-middle">
                                    Local: {{ ucfirst(strtolower($empresaItem['nomeFantasia'])) }}
                                    <img src="/img/logo_empresas/{{ $empresaItem['image'] }}"
                                        class="img-fluid imgdetalheagendamento mx-1"
                                        alt="{{ $empresaItem['razaoSocial'] }}">

                                </h5>
                                <h5 class="vertical-align-middle pt-2">
                                    {{-- <x-svgplaneta width="20" height="20" margin="2px" /> --}}

                                    Endereço
                                </h5>
                                <span class="vertical-align-middle">
                                    <x-svglcursor width="20" height="20" margin="2px" />
                                    Rua:
                                    {{ ucfirst(strtolower($empresaItem['logradouro'])) }}
                                </span>
                                <span class="vertical-align-middle">
                                    <x-svglcursor width="20" height="20" margin="2px" />
                                    N°: {{ $empresaItem['numero_endereco'] }}
                                </span>
                                <span class="vertical-align-middle">
                                    <x-svglcursor width="20" height="20" margin="2px" />
                                    Bairro:
                                    {{ ucfirst(strtolower($empresaItem['bairro'])) }}
                                </span>
                                <span class="vertical-align-middle">
                                    <x-svglcursor width="20" height="20" margin="2px" />
                                    Cidade:
                                    {{ ucfirst(strtolower($empresaItem['cidade'])) }}
                                </span>
                                <span class="vertical-align-middle">
                                    <x-svglcursor width="20" height="20" margin="2px" />

                                    Estado: {{ $empresaItem['uf'] }}

                                </span>

                                <h5 class="vertical-align-middle pt-2">


                                    Contato
                                </h5>

                                <span class="vertical-align-middle">
                                    <x-svgtelefone width="20" height="20" margin="2px" />



                                    Telefone: {{ $empresaItem['telefone'] }}

                                </span>


                                <span class="vertical-align-middle pt-2">
                                    <x-svgcelular width="20" height="20" margin="2px" />
                                    Celular: {{ $empresaItem['celular'] }}



                                </span>





                                <div class="pt-1">
                                    <a href="/empresas/dados/{{ $empresaItem['id'] }}"
                                        class="btn btn-primary">Detalhes</a>

                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                <div class="card">
                    <div class="card-header">
                        Mensagens
                    </div>
                    <div class="card-body">
                        <div class="form-floating" id="mensagem-enviada">
                            <textarea class="form-control" id="tela" style="height: 250px" disabled></textarea>
                        </div>
                        <div class="form-floating pt-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="comentario" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                        <div class="pt-2">
                            <a class="btn btn-primary" id="enviar">Enviar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>



    <script>
        document.getElementById('cancelaracao').addEventListener('click', function() {
            var dataHorarioAgendamento = "{{ $agendamento->dataHorarioAgendamento }}";

            // Converter a data e hora para o formato desejado (yyyy-MM-ddThh:mm)
            var dataHoraOriginal = new Date(dataHorarioAgendamento);
            var dataHoraFormatada = dataHoraOriginal.toISOString().slice(0, 16);





            var btcancelarAgendamento = document.getElementById('cancelarAgendamento');
            var dataHorarioAgendamento = document.getElementById('dataHorarioAgendamento');
            var btcancelaracao = document.getElementById('cancelaracao');
            btcancelaracao.style.display = 'none';
            btcancelarAgendamento.style.display = 'block';
            dataHorarioAgendamento.value = dataHoraFormatada;
            dataHorarioAgendamento.classList.add('campodesablitado');

            // Reativar a funcionalidade original para o próximo clique
            primeiroClique = true;
        });
    </script>






    <script src="/js/DetalhesAgendamentos.js"></script>
@endsection
