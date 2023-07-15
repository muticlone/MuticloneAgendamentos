@extends('Layout.main')
@section('logo','logo_empresa.png')
@section('title',$empresa->nomeFantasia)

@section('conteudo')

<div class="col-md-10 offset-md-1 ">

    <div class="row g-12">
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2"align = "center">
          

          
            <img src="/img/logo_empresas/{{ $empresa->image}}" class="img-fluid  img_dados_empresa" alt="{{$empresa->razaoSocial}}">
             
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">
             

           
            @if($empresa->nomeFantasia)
                <h3 class="vertical-align-middle">
                    <x-svg-ico-empresa width="20" height="20" margin="2px"/>
                {{ $empresa->nomeFantasia}}
                </h3>
            @endif
          
            @if($empresa->descricao)
                <h5 class="vertical-align-middle">
                    <x-svg-person-vcard width="20" height="20" margin="2px"/>
                    Quem Somos
                </h5>
                <p class="txt_dados_empresa">{{ $empresa->descricao}}</p>
            @endif
            @if($empresa->area_atuacao)
           
            <h5 class="vertical-align-middle">
                <x-svgcard-checklist width="20" height="20" margin="2px"/>
                Ramo de atividade:
                
              
                {{ $empresa->area_atuacao}}
            </h5>
          

            
            @endif
            <span class="vertical-align-middle">
                
                <x-svgadm width="20" height="20" margin="2px"/>
                Administrador: {{$Admempresa['name']}}
            </span>
              
              

        </div>
        
    </div>
    
    
   
 
    
    <div class="row g-12"> 
        <div class="col-lg-12 col-sm-12 col-md-12 pt-2 pt-3">
            <ul class="list-group">
                <li class="list-group-item border-bottom">
                    <h5>Todos os serviços</h5>
                        
                    <div class="form-group">
                        @foreach ($servico as $servicos)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" style="font-size: 18px;" type="checkbox" value="{{$servicos->nomeServico}}" id="flexCheckDefault">
                                <a class="cor" href="/dados/servicos/{{$servicos->id}}">
                                    <label class="form-check-label" style="font-size: 18px;   cursor: pointer;"> 
                                        {{$servicos->nomeServico}}
                                    </label>
                                </a>
                               
                            </div>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        
            
            
           
         
        
    </div>

    <div class="row g-12"> 
        <div class="col-lg-6 col-sm-12 col-md-12 pt-5 "  > 

            <h3 class="vertical-align-middle vertical-align-middle">
                    
                <x-svglocalizacao width="20" height="20" margin="2px"/>
                Localização 
            </h3>
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.!2d{{ $empresa->longitude }}!3d{{ $empresa->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7463b12bfda1035%3A0x373937af9e59ad56!2s{{ $empresa->logradouro }}%20%2C%20{{ $empresa->numero_endereco }}%20-%20{{ $empresa->bairro }}%2C%20{{ $empresa->cidade }}%20-%20{{ $empresa->uf }}%2C%2045065-000!5e0!3m2!1spt-BR!2sbr!4v1675985984301!5m2!1spt-BR!2sbr" width="100%" height="85%" style="border:0;  border-radius: 10px  ;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12 pt-5 ">
           <h3 class="vertical-align-middle">
            <x-svgplaneta width="20" height="20" margin="2px"/>
           
                Endereço 
            </h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svglcursor width="20" height="20" margin="2px"/>
                        RUA: {{ $empresa->logradouro}}
                    </span> 
                </li>

                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svglcursor width="20" height="20" margin="2px"/>
                        N°: {{ $empresa->numero_endereco }}
                    </span>

                </li>
        
                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svglcursor width="20" height="20" margin="2px"/>
                        BAIRRO: {{ $empresa->bairro }}
                    </span>

                </li>
                            
                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svglcursor width="20" height="20" margin="2px"/>
                        CIDADE:{{ $empresa->cidade }}
                    </span>
                                                 
                </li>
    
                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svglcursor width="20" height="20" margin="2px"/>
                        
                        ESTADO:{{ $empresa->uf }}
                       
                    </span>
                    
                </li>
                <br>
            </ul>
            <h3 class="pt-2" class="vertical-align-middle">
                <span class="vertical-align-middle">
                    <x-svg-contato width="20" height="20" margin="2px"/>
                
                    Contato
                </span>
               
            </h3>        
                
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svgtelefone width="20" height="20" margin="2px"/>
                
                    
                        Telefone: {{ $empresa->telefone}}
                    </span>
                   
                </li>
                @if($empresa->celular)
                <li class="list-group-item">
                    <span class="vertical-align-middle">
                        <x-svgcelular width="20" height="20" margin="2px"/>
                        Celular: {{ $empresa->celular}}
                    </span>
                    <a href="https://wa.me/55{{$numeroCelular = str_replace(['-', ' '], '', $empresa->celular);}}" 
                        class="btn btn-success btn-sm rounded float-end" 
                        data-bs-toggle="tooltip" data-bs-placement="bottom" 
                        data-bs-title="Conversar com {{$numeroCelular}} no WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>
                        Whatsapp
                    </a>
                </li>
                <br>
                @endif
            </ul>
        </div>
    </div>




   


</div>




@endsection