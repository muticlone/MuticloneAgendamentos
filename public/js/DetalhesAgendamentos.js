// comentarios
var enviarBtn = document.getElementById("enviar");
var comentarioTextarea = document.getElementById("comentario");
var telaTextarea = document.getElementById("tela");
var nome = document.getElementById("nome");

// Adicionar um manipulador de evento ao botão de envio
enviarBtn.addEventListener("click", function() {
    // Capturar o valor do comentário
    var comentario = comentarioTextarea.value.trim(); // Remover espaços em branco no início e no fim

    // Verificar se o campo de comentário não está vazio
    if (comentario !== "") {
        // Atualizar o conteúdo da área de texto "tela" com a mensagem enviada
        telaTextarea.value = nome.value + ": " + comentario + "\n" + telaTextarea.value;

        // Limpar a área de texto do comentário após o envio
        comentarioTextarea.value = "";
    }
});

//botões

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

document.getElementById('voltar').addEventListener('click', function() {
    var textarea = document.getElementById('motivoCacelamento');
    var btnvoltar = document.getElementById('voltar');
    var btnagendar = document.getElementById('reagendarAgendamento');

    textarea.style.display = 'none';
    btnvoltar.style.display = 'none';
    btnagendar.style.display = 'block';
});
