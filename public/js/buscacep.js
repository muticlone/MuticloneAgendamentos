// busca cep

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouro').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
   
    
  }
  
  function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('logradouro').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('uf').value=(conteudo.uf);
   
    
  } //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    //alert("CEP não encontrado.");
    document.getElementById('logradouro').value=("CEP não encontrado.");
    //document.getElementById('bairro').value=("CEP não encontrado.");
    document.getElementById('cidade').value=("CEP não encontrado.");
    document.getElementById('uf').value=("não...");
    
    
  }
  }
  
  function pesquisacep(valor) {
  
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');
  
  //Verifica se campo cep possui valor informado.
  if (cep != "") {
  
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;
  
    //Valida o formato do CEP.
    if(validacep.test(cep)) {
  
        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('logradouro').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";
        
       
  
        //Cria um elemento javascript.
        var script = document.createElement('script');
  
        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep.replace(/[^0-9]/g,'') + '/json/?callback=meu_callback';
  
        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);
  
    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        //alert("Formato de CEP inválido.");
        document.getElementById('logradouro').value=("Formato de CEP inválido..");
        document.getElementById('bairro').value=("Formato de CEP inválido..");
        document.getElementById('cidade').value=("Formato de CEP inválido..");
        document.getElementById('uf').value=("invál...");
        
       
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
  };
