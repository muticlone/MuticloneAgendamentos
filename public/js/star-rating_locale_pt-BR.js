
(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof module === 'object' && typeof module.exports === 'object') { 
        factory(require('jquery'));
    } else { 
        factory(window.jQuery);
    }
}(function ($) {
    "use strict";
    $.fn.ratingLocales['pt-BR'] = {
        defaultCaption: '{rating} Estrelas',
        starCaptions: {
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
        },
        starTitles: {
            1: 'Uma Estrela',
            2: 'Duas Estrelas',
            3: 'Três Estrelas',
            4: 'Quatro Estrelas',
            5: 'Cinco Estrelas'
        },        
        clearButtonTitle: 'Limpar',
        clearCaption: 'Não Avaliado'
    };
}));