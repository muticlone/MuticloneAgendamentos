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
