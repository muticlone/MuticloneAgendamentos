

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
       
        <nav class="navbar navbar-expand-lg bg-light-tertiary" id="navbar">
            <div class="container-fluid">
                 <a href="{{route('home');}}">
                    <img src="/img/logo.png" alt="logo">
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home');}}">Home</a>
                  </li>
                  @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('pag.cadastrar.Empresa');}}">Novo Cadastro Empresa</a>
                  </li>
                

                 
                  <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Meu serviços</a>
                  </li>

                  <li class="nav-item">
                   <form action="/logout" method="POST">
                    @csrf
                        <a class="nav-link" href="/logout"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Sair</a>
                    </form>
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
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id ='info-container'>
                        <a class="nav-link dropdown-toggle current-theme tema" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <ion-icon name="copy-outline"></ion-icon> Tema
                        </a>
                       
                        <ul class="dropdown-menu themes-list">
                            <li>
                                <a class="dropdown-item" href="#" data-theme="light">
                                    <ion-icon name="sunny-outline"></ion-icon> Claro
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-theme="dark">
                                    <ion-icon name="moon-outline"></ion-icon> Escuro
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-theme="auto">
                                    <ion-icon name="contrast-outline"></ion-icon> Auto
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
              
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
    <script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
    <script src="/js/trocaTema.js"></script>
    <script src="/js/buscacep.js"></script>
    <script src="/js/buscacnpj.js"></script>
    <script src="/js/mascara.js"></script>
 

    
    </body>
</html>