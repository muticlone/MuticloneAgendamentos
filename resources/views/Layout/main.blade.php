

<!DOCTYPE html>
<html lang="pt-br"  data-bs-theme="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link type="image/png" sizes="148x148" rel="icon" href="/img/logo_ico/@yield('logo')">
        
        <title>@yield('title')</title>

        <!-- fonte do google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- css bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- css da aplicação -->
        <link href="/css/Styles.css"  rel="stylesheet"/>
       
    </head>
    <body class="container">
    <header>
       
        {{-- <nav class="navbar navbar-expand-lg bg-light-tertiary" id="navbar">
            <div class="container-fluid">
                 <a href="{{route('home');}}">
                    <img src="/img/logo.png" alt="logo">
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home');}}">Home</a>
                  </li>
                  
                  @auth
                
                   
                 

                  
                      
                  

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Empresa
                    </a>
                    <ul class="dropdown-menu">

                        
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('pag.cadastrar.Empresa');}}">Novo Cadastro Empresa</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Minhas empresas</a>
                        </li>
        
                         
                        
        
                        <li class="nav-item">
                    </ul>
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

                 
                </ul>
                <ul class="navbar-nav second-ul">
                  
                    <li class="nav-item dropdown" id ='info-container'>
                        <a class="nav-link dropdown-toggle current-theme tema" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                          </svg> 
                        </a>

                        
                       
                        <ul class="dropdown-menu themes-list">
                          @auth 
                          <li>
                            <a class="dropdown-item" href="/user/profile">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg> Meu perfil
                            </a>
                          </li>
                          @endauth
                          <ul class="dropdown-menu themes-list"> 
                            
                          </ul>
                          <li>
                              <samp>Temas</samp>
                                <a class="dropdown-item" href="#" data-theme="light">
                                  Claro <ion-icon name="sunny-outline"></ion-icon> 
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-theme="dark">
                                  Escuro <ion-icon name="moon-outline"></ion-icon> 
                                </a>
                            </li>
                            
                            @auth 
                            <li class="nav-item">
                              <form action="/logout" method="POST">
                                  @csrf
                                      <a class="nav-link" href="/logout"
                                          onclick="event.preventDefault(); this.closest('form').submit();">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                          </svg>
                                          Sair</a>
                              </form>
                          </li>   
                            @endauth
                            
                        </ul>
                    </li>
                </ul>
              
              </div>
            </div>
         
        </nav> --}}

        <nav class="navbar navbar-expand-lg bg-light-tertiary">
          <div class="container-fluid">
            <a href="{{route('home');}}">
              <img class="imgnavbar" src="/img/logo.png" alt="logo">
          </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>
                  @auth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Empresa
                    </a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pag.cadastrar.Empresa') }}">Novo Cadastro Empresa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Minhas empresas</a>
                      </li>
                    </ul>
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
                  <ul class="navbar-nav second-ul">
                  
                    <li class="nav-item dropdown" id ='info-container'>
                        <a class="nav-link dropdown-toggle current-theme tema" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                          </svg> 
                        </a>

                        
                       
                        <ul class="dropdown-menu themes-list">
                          @auth 
                          <li>
                            <a class="dropdown-item" href="/user/profile">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg> Meu perfil
                            </a>
                          </li>
                          @endauth
                          <ul class="dropdown-menu themes-list"> 
                            
                          </ul>
                          <li>
                              <samp>Temas</samp>
                                <a class="dropdown-item" href="#" data-theme="light">
                                  Claro <ion-icon name="sunny-outline"></ion-icon> 
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-theme="dark">
                                  Escuro <ion-icon name="moon-outline"></ion-icon> 
                                </a>
                            </li>
                            
                            @auth 
                            <li class="nav-item">
                              <form action="/logout" method="POST">
                                  @csrf
                                      <a class="nav-link" href="/logout"
                                          onclick="event.preventDefault(); this.closest('form').submit();">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                          </svg>
                                          Sair</a>
                              </form>
                          </li>   
                            @endauth
                            
                        </ul>
                    </li>
                </ul>
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
   
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    
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
   
    <script src="/js/trocaTema.js"></script>
    <script src="/js/buscacep.js"></script>
    <script src="/js/buscacnpj.js"></script>
    <script src="/js/mascara.js"></script>
    <script src="/js/validacaoformulario.js"></script>
 

    
    </body>
</html>