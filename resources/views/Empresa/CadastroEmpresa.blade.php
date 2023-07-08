@extends('Layout.main')

@section('title','Cadastrar Empresa')

@section('conteudo')

<div class="col-md-6 offset-md-3 pt-2"> 
    <form action="{{route('cadastrar.Empresa');}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-12">
            <div class="form-group">
                <label for="formFile" class="form-label">Adicionar logotipo da empresa:</label>
                <input class="form-control" type="file" id="formFile">
            </div>
           
                
                <div class="col-lg-5 col-sm-12 col-md-12 pt-2"> 
                    <div class="form-group">
                        <label for="title">Cnpj:</label>
                        <input type ="text" class="form-control" id="cnpj" name="cnpj" placeholder ="Cnpj"  maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" required/>
                    </div>
                </div>
           
           
            <div class="col-lg-7 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Razão Social:</label>
                    <input type ="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder ="Razão Social" required/>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Nome Fantasia:</label>
                    <input type ="text" class="form-control" id="NomeFantasia" name="nomeFantasia" placeholder ="Nome Fantasia"  />
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Telefone:</label>
                    <input type ="tel" class="form-control" id="telefone" name="telefone" placeholder ="Telefone" required/>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Celular:</label>
                    <input type="tel" class="form-control" id="Celular" name="celular" placeholder ="Celular" maxlength="13" onkeypress="formatar('##-#####-###', this)" />
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Cep:</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder ="Cep"  onblur="pesquisacep(this.value);" OnKeyPress="formatar('#####-###', this)" size="10" maxlength="9" required/>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Logradouro:</label>
                    <input type ="text" class="form-control" id="logradouro" name="logradouro" placeholder ="Logradouro"required/>
                </div>
            </div>
            <div class="col-lg-2 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Numero:</label>
                    <input type ="number" class="form-control" id="numero_endereco" name="numero_endereco" placeholder ="N°"required/>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Complemento:</label>
                    <input type ="text" class="form-control" id="complemento" name="complemento" placeholder ="Complemento"/>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Bairro:</label>
                    <input type ="text" class="form-control" id="bairro" name="bairro" placeholder ="Bairro"/>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Cidade:</label>
                    <input type ="text" class="form-control" id="cidade" name="cidade" placeholder ="Cidade" required/>
                </div>
            </div>

            <div class="col-lg-3 col-sm-12 col-md-12 pt-2 "> 
                <div class="form-group">
                    <label for="title">Uf:</label>
                    <input type ="text" class="form-control" id="uf" name="uf" placeholder ="Uf"required/>
                </div>
            </div>

            
            <div class="col-lg-12 col-sm-12 col-md-12 pt-2  "align="center"> 
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            
            
        </div>
       
    </form>
</div>




@endsection