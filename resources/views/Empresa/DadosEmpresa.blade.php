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
            
            <x-contato 
                
                telefone="{{ $empresa->telefone}}" 
                celular="{{ $empresa->celular}}" 
                Whatsapp="{{$numeroCelular = str_replace(['-', ' '], '', $empresa->celular);}}"
            />
        </div>
    </div>




   


</div>




@endsection