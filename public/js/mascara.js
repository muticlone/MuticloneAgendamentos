function formatar(mascara, documento) {
  var i = documento.value.length;
  var saida = mascara.substring(0, 1);
  var texto = mascara.substring(i)

  if (texto.substring(0, 1) != saida) {
    documento.value += texto.substring(0, 1);
  }

}




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

















