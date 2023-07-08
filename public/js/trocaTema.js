// alternar entre os temas

$(document).ready(function() {
    function removerActiveClassTheme() {
        $('.themes-list li a').removeClass('active');
    }

    // Verifica se há uma opção salva no localStorage
    var savedTheme = localStorage.getItem('selectedTheme');
    if (savedTheme) {
        $('html').attr('data-bs-theme', savedTheme);
        $('.themes-list li a[data-theme="' + savedTheme + '"]').addClass('active');

        if (savedTheme === 'dark') {
            $('#navbar img').css('filter', 'invert(1)');
        } else {
            $('#navbar img').css('filter', 'none');
        }
    }

    $('.themes-list li').on('click', function() {
        let linkElement = $(this).find('a');
        let theme = linkElement.data('theme');
        $('html').attr('data-bs-theme', theme);
        removerActiveClassTheme();
        linkElement.addClass('active');

        if (theme === 'dark') {
            $('#navbar img').css('filter', 'invert(1)');
        } else {
            $('#navbar img').css('filter', 'none');
        }

        // Salva a opção selecionada no localStorage
        localStorage.setItem('selectedTheme', theme);
    });
});

  
  

 
