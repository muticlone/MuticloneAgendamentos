@extends('Layout.main')
@section('logo','logo_empresa.png')
@section('title','Dashboard')

@section('conteudo')
<div class="col-md-10 offset-md-1 pt-5 ">
    <div class="row g-12">

        <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "align = "center">
          

          
            <img src="/img/logo_servicos/{{ $servico->imageservico}}" class="img-fluid  img_dados_empresa" alt="{{$servico->nomeServico}}">
             
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2">
            <h3>{{$servico->nomeServico}}</h3>
            <h5>Preço R${{$servico->valorDoServico}}</h5>
            <h5>Descrição do serviço</h5>
            <p>{{$servico->descricaosevico}}</p>
            <h5>Formas de Pagamento</h5>
            <ul id="items-list">
                @foreach($servico->formaDePagamento as $formadepagamento)
                <li>
                  <div class="listadepagamentos">
                    @if($formadepagamento == "Dinheiro")
                      <x-dinheiro width="20" height="20" margin="5px" />
                    @elseif($formadepagamento == "pix") 
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
              

        </div>



        
    </div>
</div>



@endsection