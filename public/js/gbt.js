const result = document.getElementById("result");
const generateButton = document.getElementById("generateDescription");
const selectArea = document.getElementById("area-atuacao");
const inputQuestion = document.getElementById("outra-area");
const NomeFantasia = document.getElementById("NomeFantasia");


generateButton.addEventListener("click", () => {
    const selectedValue = selectArea.value === "Outro" ? inputQuestion.value : selectArea.value;
    const nomeFantasiaValue = NomeFantasia.value;
    if (selectedValue) SendQuestion(selectedValue , nomeFantasiaValue);
});

let OPENAI_API_KEY = "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";

// ...

function SendQuestion(area, nomeFantasiaValue) {
  // Mostrar a mensagem de carregamento
  const loadingMessage = document.getElementById("loadingMessage");
  const nomeDesci = document.getElementById("nomeDesci");
  loadingMessage.style.display = "block";
  nomeDesci.textContent = "Criando";

  var sQuestion = `Faça um texto descritivo para uma empresa que atua na área de ${area}
    com chamada ${nomeFantasiaValue} que tenha no máximo duzentos caracteres`;

  fetch("https://api.openai.com/v1/completions", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
      Authorization: "Bearer " + OPENAI_API_KEY,
    },
    body: JSON.stringify({
      model: "text-davinci-003",
      prompt: sQuestion,
      max_tokens: 2048, // tamanho da resposta
      temperature: 0.5, // criatividade na resposta
    }),
  })
    .then((response) => response.json())
    .then((json) => {
      // Remover a mensagem de carregamento
      loadingMessage.style.display = "none";
      nomeDesci.textContent = "Gere uma descrição";

      if (result.value) result.value += "\n";

      if (json.error?.message) {
        result.value += `Error: ${json.error.message}`;
      } else if (json.choices?.[0].text) {
        var text = json.choices[0].text || "Sem resposta";

        result.value += text.trim();
      }

      result.scrollTop = result.scrollHeight;
    })
    .catch((error) => {
      console.error("Error:", error);
      // Em caso de erro, também é importante remover a mensagem de carregamento
      loadingMessage.style.display = "none";
      nomeDesci.textContent = "Gere uma descrição";
    })
    .finally(() => {
      
      inputQuestion.disabled = false;
      inputQuestion.focus();
    });

  if (result.value) result.value += "\n";

  inputQuestion.disabled = true;

  result.scrollTop = result.scrollHeight;
}




