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

const https = require('https');
const fs = require('fs');
const express = require('express');

const app = express();

const privateKeyPath = 'key.pem'; // Caminho para key.pem
const certificatePath = 'cert.pem'; // Caminho para cert.pem

https.createServer({
    key: fs.readFileSync(privateKeyPath),
    cert: fs.readFileSync(certificatePath)
}, app)
    .listen(3000, () => {
        console.log('Aplicativo rodando na https://seu_endereco:3000/');
    });

