 //busca cnpj
 const inputElement = document.getElementById("cnpj");

 const inputcpj = document.querySelector("#cnpj");
 
 
 

   
  
   const BuscaCnpjRazãoSocial = document.querySelector("#razaoSocial");
 
   const BuscaCnpjNOmeFantacia = document.querySelector('#NomeFantasia');
 
   const buscaCnpjCep = document.querySelector("#cep");
   
   const BuscaCnpjRua = document.querySelector("#logradouro");
 
   const BuscaCnpjbairro = document.querySelector("#bairro");
 
   const buscacnpjNumeroEdereço = document.querySelector("#numero_endereco");
  
   const buscacnpjuf = document.querySelector("#uf");
 
   const buscacnpjCidade = document.querySelector("#cidade");
 
   const buscacnpjtelefone = document.querySelector("#telefone");
   
 
   const buscacnpjcomplemento = document.querySelector("#complemento");
   
   
   
 
 
 
  
   inputcpj.onchange = async function() {
   const cnpj = inputElement.value.replace(/\D/g, '');
 
   
   if (cnpj.length === 14) {
    BuscaCnpjRazãoSocial.value = 'Buscando...';
    BuscaCnpjNOmeFantacia.value = 'Buscando...';
    
    try {
      const response = await fetch(`http://localhost:8989/get-cnpj/${cnpj}`, {
      headers: {
        'Cache-Control': 'no-cache'
      
        
      }
      
    });
      
      if (!response.ok) {
        throw new Error(`Erro ao obter dados da API: ${response.statusText}`);
      }
      const dadosDaBuscadoCnpj = await response.json();
      
      // Verifica se a propriedade "situacao" existe e se ela é igual a "ATIVA"
      if (dadosDaBuscadoCnpj.hasOwnProperty("situacao") && dadosDaBuscadoCnpj.situacao !== "ATIVA") {
        throw new Error(`Empresa não está ativa`);
      }
      
      BuscaCnpjRazãoSocial.value =`
        ${dadosDaBuscadoCnpj.nome || "CNPJ Inválido"}
      `.trim();
    
      BuscaCnpjNOmeFantacia.value =`
        ${dadosDaBuscadoCnpj.fantasia || "CNPJ Inválido"}
      `.trim();
    
      buscaCnpjCep.value =`
         ${dadosDaBuscadoCnpj.cep || "CNPJ Inválido"}
       `.trim();
    
      BuscaCnpjbairro.value =`
        ${dadosDaBuscadoCnpj.bairro || "CNPJ Inválido" }
      `.trim();
    
      buscacnpjNumeroEdereço.value =`
        ${dadosDaBuscadoCnpj.numero || "CNPJ Inválido"}
      `.trim();
    
      BuscaCnpjRua.value =`
        ${dadosDaBuscadoCnpj.logradouro || "CNPJ Inválido"}
      `.trim();
    
      buscacnpjuf.value =`
        ${dadosDaBuscadoCnpj.uf || "CNPJ Inválido"}
      `.trim();
    
      buscacnpjCidade.value =`
        ${dadosDaBuscadoCnpj.municipio || "CNPJ Inválido"}
      `.trim();
    
      buscacnpjtelefone.value =`
        ${dadosDaBuscadoCnpj.telefone || "CNPJ Inválido" }
      `.trim();
    
      buscacnpjcomplemento.value =`
        ${dadosDaBuscadoCnpj.complemento }
      `.trim();
  
     
  
  
  
  
     
  
        
      
  
  
  
     
      
      
    } catch (error) {
      //console.error(error);
      if (error.message === "Empresa não está ativa") {
        BuscaCnpjRazãoSocial.value = "CNPJ NÃO ESTA ATIVO";
        BuscaCnpjNOmeFantacia.value = "CNPJ NÃO ESTA ATIVO";
        buscaCnpjCep.value = "CNPJ NÃO ESTA ATIVO";
        BuscaCnpjbairro.value = "CNPJ NÃO ESTA ATIVO";
        buscacnpjNumeroEdereço.value = "CNPJ NÃO ESTA ATIVO";
        BuscaCnpjRua.value = "CNPJ NÃO ESTA ATIVO";
        buscacnpjuf.value = "CNPJ NÃO ESTA ATIVO";
        buscacnpjCidade.value = "CNPJ NÃO ESTA ATIVO";
        buscacnpjtelefone.value = "CNPJ NÃO ESTA ATIVO";
        buscacnpjcomplemento.value = "CNPJ NÃO ESTA ATIVO";
      }
    }
    
  
    
  
  
   }
 
   
 
     
   };

   //cadastro de cliente alterar o campos cpf e cnpj

   function changeInputType() {
    const checkbox = document.getElementById("flexSwitchCheckChecked");
    const inputCNPJ = document.querySelector('input[name="cnpj_cpf"]');
    
    const labelCNPJ = document.getElementById("labelCnpj");
    

    if (checkbox.checked) {
        inputCNPJ.setAttribute("placeholder", "CPF");
        inputCNPJ.setAttribute("maxlength", "14");
        inputCNPJ.setAttribute("minlength", "14");
        labelCNPJ.innerText = "CPF";
        
      
        inputCNPJ.setAttribute("onkeypress", "formatar('###.###.###-##', this)");
       
        
        
    } else {
        inputCNPJ.setAttribute("placeholder", "CNPJ");
        inputCNPJ.setAttribute("maxlength", "18");
        inputCNPJ.setAttribute("minlength", "18");
        labelCNPJ.innerText = "Cnpj";
        inputCNPJ.setAttribute("onkeypress", "formatar('##.###.###/####-##', this)");
       
       
    }
}

