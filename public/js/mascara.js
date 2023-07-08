function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)
    
    if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
    }
    
    }


    document.addEventListener('DOMContentLoaded', function() {
        var carousel = document.getElementById('carouselExampleDark');
        var button = carousel.querySelector('.carousel-control-next');
      
        setTimeout(function() {
          button.click();
        }, 8000); // 8 segundos em milissegundos
      });


      