<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="image/png" rel="icon" href="/img/logo_ico/logo_muticlone.png">

    <title>@yield('title')</title>

    <!-- fonte do google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- css da aplicação -->
    <link href="/css/Styles.css" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css"
        media="all" rel="stylesheet" type="text/css" />






    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>


</head>


<body class="container">
    <header>




        <nav class="navbar navbar-expand-lg bg-light-tertiary ">

            <div class="container-fluid ">

                <a href="{{ route('home') }}">

                    <img class="imgnavbar" src="/img/logo.png" alt="logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <a href="{{ route('home') }}">

                            <img class="imgnavbar" src="/img/logo.png" alt="logo">
                        </a>

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
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
                                @if (Auth::user()->agendamentos->count() > 0)
                                    <li class="nav-item">

                                        <a class="nav-link active text-nowrap" aria-current="page"
                                            href="{{ route('clientes.agendamentos', ['status' => 'ativos']) }}">

                                            Meus agendamentos
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->user_type == 'company')
                                    <li class="nav-item">

                                        <a class="nav-link active text-nowrap" aria-current="page" href="/dashboard">

                                            Meus Negócios
                                        </a>
                                    </li>
                                @endif
                                @if (Auth::user()->user_type == 'root')
                                    <li class="nav-item">

                                        <a class="nav-link active text-nowrap" aria-current="page" href="/dashboard">

                                            Meus Negócios
                                        </a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link active text-nowrap" aria-current="page"
                                            href="{{ route('root') }}">

                                            Root
                                        </a>
                                    </li>
                                @endif



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


                                <ul
                                    class="navbar-nav
                            @if (Auth::user()->user_type == 'company') second-ul
                            @elseif (Auth::user()->agendamentos->count() > 0)
                                other-uls
                            @else
                                other-ul @endif">


                                    <li class="nav-item">

                                        <a href="" class="nav-link vertical-align-middle" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" class="bi bi-gear mx-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                                <path
                                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                            </svg>
                                            Ajustes</a>
                                    </li>



                                </ul>
                            @endauth
                            <li style='display: none;' class="nav-item">

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        {{-- Ajustes --}}
        <div class="offcanvas  offcanvas-top " data-bs-backdrop="false" tabindex="-1" id="offcanvasRight"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Ajustes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="col-12">
                    <a class="dropdown-item" href="/user/profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg> Meu perfil
                    </a>
                </div>

                <div class="col-12 pt-2">
                    <form action="/logout" method="POST">
                        <a class="dropdown-item" href="/logout"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg> Sair
                        </a>
                    </form>

                </div>

            </div>
        </div>







    </header>





    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
                @if (session('msgErro'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('msgErro') }}
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





    {{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
      var liveToastBtn = document.getElementById('liveToastBtn');
      var liveToast = document.getElementById('liveToast');

      liveToastBtn.addEventListener('click', function() {
        var toast = new bootstrap.Toast(liveToast);
        toast.show();
      });
    });
  </script>  --}}



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>



    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>





    <!-- Load Bootstrap Star Rating JS -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js"
        type="text/javascript"></script>
    <!-- Load Portuguese language file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/pt-BR.js"></script>


    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>





    <script src="/js/trocaTema.js"></script>

    <script src="/js/mascara.js"></script>
    <script src="/js/validacaoformulario.js"></script>




</body>

</html>
