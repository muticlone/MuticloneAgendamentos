(function ($) {
    "use strict";
    $.fn.rating.defaults.language = 'pt-BR';
    $.fn.rating.defaults.starCaptions = {
      0.5: 'Meia Estrela',
      1: 'Uma Estrela',
      1.5: 'Uma Estrela e Meia',
      2: 'Duas Estrelas',
      2.5: 'Duas Estrelas e Meia',
      3: 'Três Estrelas',
      3.5: 'Três Estrelas e Meia',
      4: 'Quatro Estrelas',
      4.5: 'Quatro Estrelas e Meia',
      5: 'Cinco Estrelas'
    };
    $.fn.rating.defaults.clearButtonTitle = 'Limpar';
    $.fn.rating.defaults.clearCaption = 'Não Avaliado';
  })(window.jQuery);
  