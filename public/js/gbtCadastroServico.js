const resutservico = document.getElementById("resutservico");
const generateButtonservico = document.getElementById("generateDescriptionSevico");
const nomeServico = document.getElementById("nomeservico");

generateButtonservico.addEventListener("click", () => {
    const selectedValue = nomeServico.value;
    if (selectedValue) SendQuestion2(selectedValue);
});
const OPENAI_API_KEY2 = "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";

// ...

function SendQuestion2(area) {
    // Mostrar a mensagem de carregamento
    const loadingMessage = document.getElementById("loadingMessageservico");
    const nomeDesci = document.getElementById("nomeDesciservico");
    loadingMessage.style.display = "block";
    
    nomeDesci.textContent = "Criando uma descrição";

    var sQuestion = `Faça um texto descritivo para o serviço ${area}
         que tenha no máximo duzentos caracteres`;

    fetch("https://api.openai.com/v1/completions", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Authorization: "Bearer " + OPENAI_API_KEY2,
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

            if (resutservico.value) resutservico.value += "\n";

            if (json.error?.message) {
                resutservico.value += `Error: ${json.error.message}`;
            } else if (json.choices?.[0].text) {
                var text = json.choices[0].text || "Sem resposta";

                resutservico.value += text.trim();
            }

            resutservico.scrollTop = resutservico.scrollHeight;
        })
        .catch((error) => {
            console.error("Error:", error);
            // Em caso de erro, também é importante remover a mensagem de carregamento
            loadingMessage.style.display = "none";
            nomeDesci.textContent = "Gere uma descrição";
        })
        .finally(() => {
            
            nomeServico.disabled = false;
            nomeServico.focus();
        });

    if (resutservico.value) resutservico.value += "\n";

    nomeServico.disabled = true;

    resutservico.scrollTop = resutservico.scrollHeight;
}
