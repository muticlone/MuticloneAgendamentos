// Adicionar um ouvinte de eventos para os links das abas
var tabLinks = document.querySelectorAll('.nav-item.nav-link');
tabLinks.forEach(function(tabLink) {
    tabLink.addEventListener('click', function(e) {
        e.preventDefault();
        var tabId = tabLink.getAttribute('href');

        // Remover a classe 'active' de todos os links de abas
        tabLinks.forEach(function(link) {
            link.classList.remove('active');
        });

        // Adicionar a classe 'active' apenas ao link da aba clicada
        tabLink.classList.add('active');

        // Mostrar o conteúdo da aba selecionada
        var tabContents = document.querySelectorAll('.tab-pane');
        tabContents.forEach(function(tabContent) {
            tabContent.classList.remove('show', 'active');
        });
        var selectedTabContent = document.querySelector(tabId);
        selectedTabContent.classList.add('show', 'active');
    });
});
