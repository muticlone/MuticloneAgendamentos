@props(['agendamento_confirmado' => '', 'agendamento_finalizado' => '', 'agendamento_id' => '', 'agendamento_nota' => '', 'user_name' => '', 'agendamento_comentario' => '', 'agendamento_cancelado' => '', 'agendamento_motivoCancelamento' => '', 'agendamento_dataHorarioAgendamento' => ''])


<div>

    <div class="button-containerMeusClientesAgendamentosDetalhes">
        @if ($agendamento_confirmado == 0 && $agendamento_cancelado == 0)
            <div class="btnMeusClientesAgendamentoDetalhes">
                <form action="/confirmar{{ $agendamento_id }}" method="POST">
                    @csrf
                    @method('PUT')


                    <button type="submit" id="ConfirmarAgendamento" style="display: block;"
                        class="btn btn-success btntamanhoMeusClientesAgendamentoDetalhes"> Confirmar </button>

                </form>
            </div>
        @endif
        @if ($agendamento_confirmado == 1 && $agendamento_finalizado == 0)
            <div class="btnMeusClientesAgendamentoDetalhes">
                <form action="/finalizar{{ $agendamento_id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" style="display: block;" id="FinalizarAgendamento"
                        class="btn btn-success btntamanhoMeusClientesAgendamentoDetalhes  mx-1 ">
                        Finalizar
                    </button>
                </form>

            </div>
        @endif

        @if ($agendamento_finalizado == 0 && $agendamento_cancelado == 0)
            <div class="btnMeusClientesAgendamentoDetalhes">


                <button type="submit" style="display: none;" id="confirmar"
                    class="btn btn-info btntamanhoMeusClientesAgendamentoDetalhes mx-1 ">
                    Reagendar </button>



                <a style="display: block;" id="reagendarAgendamento"
                    class="btn btn-info btntamanhoMeusClientesAgendamentoDetalhes  mx-1 "> Reagendar </a>
                <a style="display: none;" id="voltar"
                    class="btn btn-warning btntamanhoMeusClientesAgendamentoDetalhes  mx-1 ">Voltar</a>
            </div>




            <div class="btnMeusClientesAgendamentoDetalhes">
                <form action="/cancelar{{ $agendamento_id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" style="display: block;" id="cancelarAgendamento"
                        class="btn btn-danger btntamanhoMeusClientesAgendamentoDetalhes  mx-1">
                        Cancelar </button>
                    <a style="display: none;" id="cancelaracao"
                        class="btn btn-danger btntamanhoMeusClientesAgendamentoDetalhes  mx-1 ">Cancelar</a>





            </div>


    </div>

    <div class="col-12 pt-2">
        <textarea class="form-control" style="display: none;" name="motivoCacelamento" id="motivoCacelamento" cols="50"
            placeholder="Digite o motivo do cancelamento" minlength="30" maxlength="100" rows="3" required></textarea>
    </div>
    </form>
    @endif
    @if ($agendamento_cancelado == 1)
        <p>Motivo: {{ $agendamento_motivoCancelamento }}</p>
    @endif

</div>

<script>
    document.getElementById('cancelarAgendamento').addEventListener('click', function() {
        var textarea = document.getElementById('motivoCacelamento');
        var btnagendar = document.getElementById('reagendarAgendamento');
        var btnvoltar = document.getElementById('voltar');
        var btnConfirmarAgendamento = document.getElementById('ConfirmarAgendamento');
        var btnFinalizarAgendamento = document.getElementById('FinalizarAgendamento');


        textarea.style.display = 'block';

        if (btnFinalizarAgendamento) {
            btnFinalizarAgendamento.style.display = 'none';
        }

        if (btnConfirmarAgendamento) {
            btnConfirmarAgendamento.style.display = 'none';
        }

        btnagendar.style.display = 'none';
        btnvoltar.style.display = 'block';

    });


    document.getElementById('voltar').addEventListener('click', function() {
        var textarea = document.getElementById('motivoCacelamento');
        var btnvoltar = document.getElementById('voltar');
        var btnagendar = document.getElementById('reagendarAgendamento');
        var btnConfirmarAgendamento = document.getElementById('ConfirmarAgendamento');
        var btnFinalizarAgendamento = document.getElementById('FinalizarAgendamento');
        var btncancelarAgendamento = document.getElementById('cancelarAgendamento');
        var btnconfirmar = document.getElementById('confirmar');



        if (btnConfirmarAgendamento) {
            btnConfirmarAgendamento.style.display = 'block';
        }

        if (btnFinalizarAgendamento) {
            btnFinalizarAgendamento.style.display = 'block';
        }

        textarea.style.display = 'none';
        btnvoltar.style.display = 'none';
        btnagendar.style.display = 'block';
        btncancelarAgendamento.style.display = 'block';
        btnconfirmar.style.display = 'none';

        var dataHorarioAgendamento = document.getElementById('dataHorarioAgendamento');
        var data = "{{ $agendamento_dataHorarioAgendamento }}";
        var dataHoraOriginal = new Date(data);
        var dataHoraFormatada = dataHoraOriginal.toISOString().slice(0, 16);
        dataHorarioAgendamento.value = dataHoraFormatada;
        dataHorarioAgendamento.classList.add('campodesablitado');

    });



    document.getElementById('reagendarAgendamento').addEventListener('click', function() {
        var dataHorarioAgendamento = document.getElementById('dataHorarioAgendamento');
        var btnConfirmarAgendamento = document.getElementById('ConfirmarAgendamento');
        var btnFinalizarAgendamento = document.getElementById('FinalizarAgendamento');
        var btncancelarAgendamento = document.getElementById('cancelarAgendamento');
        var btnvoltar = document.getElementById('voltar');
        var btnreagendarAgendamento = document.getElementById('reagendarAgendamento');
        var btnconfirmar = document.getElementById('confirmar');


        btnreagendarAgendamento.style.display = 'none';
        btnconfirmar.style.display = 'block';
        dataHorarioAgendamento.value = "";
        dataHorarioAgendamento.classList.remove('campodesablitado');



        if (btnFinalizarAgendamento) {
            btnFinalizarAgendamento.style.display = 'none';
        }

        if (btnConfirmarAgendamento) {
            btnConfirmarAgendamento.style.display = 'none';
        }
        if (btncancelarAgendamento) {
            btncancelarAgendamento.style.display = 'none';
        }

        btnvoltar.style.display = 'block';




    });


    document.getElementById("confirmar").addEventListener("click", function() {
        if (document.getElementById('FormReagendar').reportValidity()) {
            document.getElementById('FormReagendar').submit();
        }
    });
</script>
