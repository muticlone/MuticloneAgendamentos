import './bootstrap';


import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('/sw.js').then((registration) => {
        console.log('Service Worker registrado com sucesso:', registration);
      }).catch((error) => {
        console.log('Erro ao registrar Service Worker:', error);
      });
    });
  }
