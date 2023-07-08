function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)
    
    if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
    }
    
    }

    //carrosel modo aultomatico

    document.addEventListener('DOMContentLoaded', function() {
        var carousel = document.getElementById('carouselExampleDark');
        var button = carousel.querySelector('.carousel-control-next');
      
        setTimeout(function() {
          button.click();
        }, 8000); // 8 segundos em milissegundos
      });


      // outra ramo de atauação 
      
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
      
      
      
      

     
      

      