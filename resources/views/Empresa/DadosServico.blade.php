@extends('Layout.main')
@section('logo','logo_empresa.png')
@section('title','Dashboard')

@section('conteudo')
<div class="col-md-10 offset-md-1 pt-1 ">
    <div class="row g-12">

   

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "align = "center">
          
          <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "> 
            <img src="/img/logo_servicos/{{ $servico->imageservico}}" class="img-fluid  img_dados_empresa" alt="{{$servico->nomeServico}}">
          </div>
          
          <div class="col-lg-12 col-sm-12 col-md-12 pt-2 "> 
            <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div> 

           
           
           
           
            
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            
              <div class="card">
                <h5 class="card-header">{{$servico->nomeServico}}</h5>
                <div class="card-body">
                  <h5 class="card-title">R${{$servico->valorDoServico}}</h5>
                  <h5 class="card-title">Descrição do serviço</h5>
                  <p class="card-text">{{$servico->descricaosevico}}</p>
                  
                  
                  <h5  class="card-title">Formas de Pagamento</h5>
                  <ul id="items-list">
                    @foreach($servico->formaDePagamento as $formadepagamento)
                    <li>
                      <div class="listadepagamentos">
                        @if($formadepagamento == "Dinheiro")
                          <x-dinheiro width="20" height="20" margin="5px" />
                        @elseif($formadepagamento == "Pix") 
                            <x-pix width="20" height="20" margin="5px"/>
                        @elseif($formadepagamento == "Cartão de débito")
                            <x-cartao-de-depito width="20" height="20" margin="5px"/>
                        @elseif($formadepagamento == "Cartão de crédito")
                         <x-cartao_credito width="20" height="20" margin="5px"/>
                        @elseif($formadepagamento == "Boleto")
                            <x-boleto width="20" height="20" margin="5px"/>
                        @elseif($formadepagamento == "Vale-refeição")
                             <x-vale_refeicao width="20" height="20"margin="5px" />
                        @endif
                      
      
                       
                        <samp>{{$formadepagamento}}</samp>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  <button class="btn btn-primary">Agendar</button>
                  <p class="card-text pt-2">Prestadora do serviço: 
                    <a class="card-text" href="/empresas/dados/{{$servico->cadastro_de_empresas_id}}" 
                      class=" rounded float-end vertical-align-middle mx-1" 
                      data-bs-toggle="tooltip" data-bs-placement="bottom" 
                      data-bs-title="Clique para mais informações sobre a empresa {{$empresa->nomeFantasia}}">
                      {{$empresa->nomeFantasia}} 
                    </a>
                  </p>

                  

                  
                  <x-contato 
                  nome="Contato"
                 
                  telefone="{{ $empresa->telefone}}" 
                  celular="{{ $empresa->celular}}" 
                  Whatsapp="{{$numeroCelular = str_replace(['-', ' '], '', $empresa->celular);}}"
                  
                 />
      
                
                 
                  
                
                </div>
              </div>
      
              

        </div>

        
     
       

       
       
        
        

        
    </div>
</div>



@endsection