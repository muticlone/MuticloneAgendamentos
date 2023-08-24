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
