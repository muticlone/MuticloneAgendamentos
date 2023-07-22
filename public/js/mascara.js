function formatar(mascara, documento) {
  var i = documento.value.length;
  var saida = mascara.substring(0, 1);
  var texto = mascara.substring(i)

  if (texto.substring(0, 1) != saida) {
    documento.value += texto.substring(0, 1);
  }

}

//carrosel modo aultomatico

document.addEventListener('DOMContentLoaded', function () {
  var carousel = document.getElementById('carouselExampleDark');
  var button = carousel.querySelector('.carousel-control-next');

  setTimeout(function () {
    button.click();
  }, 8000); // 8 segundos em milissegundos
});


// cadastro de empresa e edit ramo de atauação ativar opção otros adicona
//um inpunt 

function mostrarOutro() {
  var selectElement = document.getElementById("area-atuacao");
  var outraAreaDiv = document.getElementById("div-outro");
  var outraAreaInput = document.getElementById("outra-area");
  var hiddenInput = document.getElementById("area-atuacao-hidden");

  if (selectElement.value === "Outro") {
    outraAreaDiv.style.display = "block";
    outraAreaInput.required = true;
    hiddenInput.value = "";
  } else {
    outraAreaDiv.style.display = "none";
    outraAreaInput.required = false;
    hiddenInput.value = selectElement.value;
  }
}

// Defina o número máximo de palavras que você deseja permitir no parágrafo
// pagina /home/servicos
const numeroMaximoPalavras = 8;

// Selecionar todos os elementos com a classe 'paragrafo-limitado'
const paragrafos = document.querySelectorAll('.paragrafo-limitado');

paragrafos.forEach(paragrafo => {
  const textoOriginal = paragrafo.innerText;
  const palavras = textoOriginal.split(' ');

  if (palavras.length > numeroMaximoPalavras) {
    const textoLimitado = palavras.slice(0, numeroMaximoPalavras).join(' ');
    paragrafo.innerText = textoLimitado + '...';
  }
});















