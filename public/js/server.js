const https = require('https');
const fs = require('fs');
const express = require('express');

const app = express();

https.createServer({
  key: fs.readFileSync('path/to/key.pem'),
  cert: fs.readFileSync('path/to/cert.pem')
}, app)
.listen(3000, () => {
  console.log('Aplicativo rodando na http://35.199.106.13:8989/');
});
