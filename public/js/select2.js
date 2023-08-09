


// fazer o select dois funcinar
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  
   
});







 // Adicionar um evento subimit ao <select2>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

   
    $('#select-servico').on('change', function() {
        $('#searchForm').submit(); // Envie o formulário quando uma opção é selecionada
    });
});


// img do select
$(document).ready(function() {
    $('#select-servico').select2({
        templateResult: formatOption,
        templateSelection: formatOption
    });

    function formatOption(option) {
        if (!option.id) return option.text;

        var imgSrc = $(option.element).data('img-src');
        if (!imgSrc) return option.text;

        var $option = $('<div><img src="' + imgSrc + '" class="img-flag" style="width: 16px; height: 16px; margin-right: 8px;" /> ' + option.text + '</div>');
        return $option;
    }
});