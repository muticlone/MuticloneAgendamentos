@extends('Layout.main')

@section('title', 'Detalhes Agendamento')

@section('conteudo')
    <div class="col-md-10 offset-md-1 pt-1 ">
        <div class="row g-12">
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "align="center">

                <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
                    <img src="/img/logo_servicos/" class="img-fluid  img_dados_empresa" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
                <form action="{{ route('home') }}" method="get">


                    @foreach ($agendamentos as $agendamento)
                        <div class="card">
                            <div class="card-header">
                                {{ $agendamento->NomeUser }}

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Produtos</h5>
                                <div class="card-body produtosDetalhesAgendamentos">
                                    <p class="card-text">
                                        @foreach ($agendamento->nomeServiçoAgendamento as $index => $nome)
                                            @php
                                                $valorun = $agendamento->valorUnitatioAgendamento[$index] ?? null;
                                                $duracaohoras = $agendamento->duracaohorasAgendamento[$index] ?? null;
                                                $duracaominutos = $agendamento->duracaominutosAgendamento[$index] ?? null;

                                            @endphp
                                            <p class="card-text">
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
                                </br>
                                <p class="card-text">
                                    Duração total:
                                    {{ $somahoras }} horas
                                    {{ $somaminutos }} minutos

                                </p>
                                <h5 class="card-title">Valor total à pagar</h5>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" class="form-control campodesablitado" value="{{ $agendamento->valorTotalAgendamento }}">

                                </div>
                                <h5 class="card-title">Forma de pagamento:  {{ $agendamento->formaDepagamentoAgendamento }}</h5>

                                <h5 class="card-title">Data do agendamento</h5>
                                <input type="datetime-local" class="form-control  campodesablitado"
                                    id="dataHorarioAgendamento" name="dataHorarioAgendamento"
                                    aria-describedby="validationTooltipUsernamePrepend"
                                    value="{{ $agendamento->dataHorarioAgendamento }}" />

                                </br>
                                <p class="card-text">Status: aguardando confirmar</p>
                                <div class="pt-1">
                                    <textarea class="form-control" style="display: none;" name="motivoCacelamento" id="motivoCacelamento" cols="50"
                                        placeholder="Digite o motivo do cancelamento" minlength="50" maxlength="250" rows="3"></textarea>

                                </div>
                                <div class="row g-12">
                                    <div class="col-4 pt-2" id="reagendar">
                                        <button type="submit" id="reagendarAgendamento" style="display: block;"
                                            class="btn btn-info"> Reagendar </button>
                                        <a style="display: none;" id="voltar" class="btn btn-info">Voltar</a>
                                    </div>
                                    <div class="col-6 pt-2">
                                        <button type="submit" id="cancelarAgendamento" style="display: block;"
                                            class="btn btn-danger"> Cancelar agendamento </button>
                                        <a style="display: none;" id="cancelaracao" class="btn btn-danger">Cancelar</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>



        <script>
            document.getElementById('cancelarAgendamento').addEventListener('click', function() {
                var textarea = document.getElementById('motivoCacelamento');
                var btnagendar = document.getElementById('reagendarAgendamento');
                var btnvoltar = document.getElementById('voltar');

                textarea.style.display = 'block';

                btnagendar.style.display = 'none';
                btnvoltar.style.display = 'block';
                textarea.required = true;
            });


            var primeiroClique = true;

            document.getElementById('reagendarAgendamento').addEventListener('click', function() {
                var dataHorarioAgendamento = document.getElementById('dataHorarioAgendamento');
                var btcancelarAgendamento = document.getElementById('cancelarAgendamento');
                var btcancelaracao = document.getElementById('cancelaracao');
                var btnagendar = document.getElementById('reagendarAgendamento');
                var conteudoElemento = document.getElementById('reagendar');

                btcancelaracao.style.display = 'block';

                if (primeiroClique) {
                    dataHorarioAgendamento.value = "";
                    dataHorarioAgendamento.classList.remove('campodesablitado');
                    primeiroClique = false;
                }

                btcancelarAgendamento.style.display = 'none';
                dataHorarioAgendamento.required = true;
            });
            document.getElementById('cancelaracao').addEventListener('click', function() {
                var dataHorarioAgendamentoInicial = "{{ $agendamento->dataHorarioAgendamento }}";
                var btcancelarAgendamento = document.getElementById('cancelarAgendamento');
                var dataHorarioAgendamento = document.getElementById('dataHorarioAgendamento');
                var btcancelaracao = document.getElementById('cancelaracao');
                btcancelaracao.style.display = 'none';
                btcancelarAgendamento.style.display = 'block';
                dataHorarioAgendamento.value = dataHorarioAgendamentoInicial;
                dataHorarioAgendamento.classList.add('campodesablitado');

                // Reativar a funcionalidade original para o próximo clique
                primeiroClique = true;
            });
            document.getElementById('voltar').addEventListener('click', function() {
                var textarea = document.getElementById('motivoCacelamento');
                var btnvoltar = document.getElementById('voltar');
                var btnagendar = document.getElementById('reagendarAgendamento');

                textarea.style.display = 'none';
                btnvoltar.style.display = 'none';
                btnagendar.style.display = 'block';
            });
        </script>




    @endsection