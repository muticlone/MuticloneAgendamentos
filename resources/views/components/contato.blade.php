<div>
    @props(['nomefantasia' => '' ,'telefone' => '',
     'celular' => '','Whatsapp'=>'' ,'id'=>'','nome' =>'',
     

    ])
    
    <h5 class="pt-2 vertical-align-middle" >
        <span class="vertical-align-middle " >
           
            
            {{$nome}}
          
            <div class="">
                <a href="/empresas/dados/{{$id}}" 
                class=" rounded float-end vertical-align-middle mx-1" 
                data-bs-toggle="tooltip" data-bs-placement="bottom" 
                data-bs-title="Clique para mais informações sobre a empresa {{$nomefantasia}}">
                {{$nomefantasia}}  </a>
            </div> 
            
           
        </span>
       
    </h5>        
        
    <ul class="list-group">
        
        
        <li class="list-group-item">
            <span class="vertical-align-middle">
                <x-svgtelefone width="20" height="20" margin="2px"/>
        
              
            
                Telefone: {{$telefone}}
                
            </span>
           
        </li>

        
        @if($celular)
        <li class="list-group-item">
            <span class="vertical-align-middle">
                <x-svgcelular width="20" height="20" margin="2px"/>
                Celular: {{$celular}}
               
            </span>
            <a href="https://wa.me/55{{$Whatsapp}}" 
                class="btn btn-success btn-sm rounded float-end vertical-align-middle" 
                data-bs-toggle="tooltip" data-bs-placement="bottom" 
                data-bs-title="Conversar com {{$Whatsapp}} no WhatsApp">
                <x-svg-Whatsapp width="20" height="20" margin="2px"/>
                Whatsapp
            </a>
        </li>
        <br>
        @endif
    
      
      
</div>


