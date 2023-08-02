

<!DOCTYPE html>
<html lang="pt-br"  data-bs-theme="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link type="image/png"  rel="icon" href="/img/logo_ico/logo_muticlone.png">
        
        <title>@yield('title')</title>

        <!-- fonte do google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- css bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- css da aplicação -->
        <link href="/css/Styles.css"  rel="stylesheet"/>

       
        <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

       
    </head>
    <body class="container">
    <header>
       
       

      <nav class="navbar navbar-expand-lg bg-light-tertiary">
          <div class="container-fluid">
            
            <a href="{{route('home');}}">
              
              <img class="imgnavbar" src="/img/logo.png" alt="logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <a href="{{route('home');}}">
              
                  <img class="imgnavbar" src="/img/logo.png" alt="logo">
                </a>
                
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    
                    <a class="nav-link active" aria-current="page" href="{{ route('home.servicos') }}">
                      
                      Início
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                      
                      Empresas 
                    </a>
                  </li>
                  @auth
                  <li class="nav-item">
                    
                    <a class="nav-link active" aria-current="page" href="/dashboard">
                      
                      Business
                    </a>
                  </li>
                  
                  
                  
                 
                  @endauth
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" href="/login">Entrar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/register">Cadastrar</a>
                  </li>
                  @endguest
                  @auth 
                  <ul class="navbar-nav second-ul">
                  
                    <li class="nav-item dropdown" id ='info-container'>
                        <a class="nav-link dropdown-toggle current-theme tema" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                          </svg> 
                          Ajustes
                        </a>

                        
                       
                        <ul class="dropdown-menu themes-list">
                          
                          <li >
                            <a class="dropdown-item linha" href="/user/profile">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg> Meu perfil
                            </a>
                          </li>
                          
                          
                          <li>
                            <a class="dropdown-item ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lamp-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5.04.303A.5.5 0 0 1 5.5 0h5c.2 0 .38.12.46.303l3 7a.5.5 0 0 1-.363.687h-.002c-.15.03-.3.056-.45.081a32.731 32.731 0 0 1-4.645.425V13.5a.5.5 0 1 1-1 0V8.495a32.753 32.753 0 0 1-4.645-.425c-.15-.025-.3-.05-.45-.08h-.003a.5.5 0 0 1-.362-.688l3-7Z"/>
                                <path d="M6.493 12.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.052.075l-.001.004-.004.01V14l.002.008a.147.147 0 0 0 .016.033.62.62 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.62.62 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411Z"/>
                              </svg>
                              Tema
                            </a>
                            
                          </li>
                          
                            <li>
                             

                                <a class="dropdown-item" href="#" data-theme="light">
                                  Claro <ion-icon name="sunny-outline"></ion-icon> 
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-theme="dark">
                                  Escuro <ion-icon name="moon-outline"></ion-icon> 
                                </a>
                            </li>
                            <div class="linha"></div>
                            <li >
                              <form action="/logout" method="POST">
                                <a class="dropdown-item" href="/logout"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                  </svg> Sair
                                </a>
                              </form>
                            </li>
                            
                           
                            
                        
                        @endauth
                    </li>
                    
                  </ul>
                  <li  style='display: none;' class="nav-item">
                    
                  </li>
                
                </ul>
              </div>
            </div>
          </div>
      </nav>
        

       
        
    
    </header>
    
    
    
   

    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                <div class="alert alert-success" role="alert">
                    {{session('msg')}}
                </div>
                   
                @endif 
                @if(session('msgErro'))
                <div class="alert alert-danger" role="alert">
                    {{session('msgErro')}}
                </div>
                @endif
                @yield('conteudo')
            </div>
        </div>
    </main>

   
    <footer class="site-footer pt-5">
        <p>Muticlone &copy; 2023</p>
        
    </footer>    
   
   
   
    <script>
      $(document).ready(function() {
      $(".pt-br").rating({
      language: 'pt-BR'
        });
    });

    </script>
    
   <script>
        document.addEventListener('DOMContentLoaded', function() {
          const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
          tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
          });
        });
      </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var liveToastBtn = document.getElementById('liveToastBtn');
      var liveToast = document.getElementById('liveToast');
  
      liveToastBtn.addEventListener('click', function() {
        var toast = new bootstrap.Toast(liveToast);
        toast.show();
      });
    });
  </script> 


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
   

   
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
   

  

    <!-- Load Bootstrap Star Rating CSS -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- Load Bootstrap Star Rating JS -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>
    <!-- Load Portuguese language file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/pt-BR.js"></script>

  

 


    <script src="/js/trocaTema.js"></script>
    
    <script src="/js/mascara.js"></script>
    <script src="/js/validacaoformulario.js"></script>



    </body>
</html>