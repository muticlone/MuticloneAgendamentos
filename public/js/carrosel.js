document.addEventListener('DOMContentLoaded', function () {
    var carousel = document.getElementById('carouselExampleDark');
    var button = carousel.querySelector('.carousel-control-next');
  
    setTimeout(function () {
      button.click();
    }, 8000); // 8 segundos em milissegundos
  });