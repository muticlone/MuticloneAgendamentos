


// Adicionar um evento subimit ao <select2>
$(document).ready(function () {

    $('.js-buscacategoria').on('change', function () {
        $('#searchForm').submit(); // Envie o formulário quando uma opção é selecionada
    });


});

document.addEventListener('DOMContentLoaded', function() {
    const dataInput = document.getElementById('dataInput');
    const searchForm = document.getElementById('searchForm'); // Adicione um id ao formulário

    dataInput.addEventListener('change', function() {
        searchForm.submit(); // Submete automaticamente o formulário quando a data é alterada
    });
});




    $(document).ready(function () {
    $('.js-buscacategoria').select2({
        theme: 'bootstrap-5',
        placeholder: 'Selecione um serviço',
        language: {
            noResults: function () {
                return "Nenhum resultado encontrado";
            }
        },


        templateResult: formatOption,
        templateSelection: formatOption,

    });

    function formatOption(option) {
        if (!option.id) return option.text;

        var imgSrc = $(option.element).data('img-src');
        if (!imgSrc) return option.text;

        var $option = $('<div><img src="' + imgSrc + '" class="img-flag" style="width: 25px; height: 25px; margin-right: 8px;" /> ' + option.text + '</div>');
        return $option;
    }
});


