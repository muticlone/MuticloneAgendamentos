@extends('Layout.main')

@section('title', 'Categoria')

@section('conteudo')


    <div class="col-md-8 offset-md-2 pt-3">
        <div class="row g-12 pt-2">
            <div class="col-12 pt-1 ">
                <div class="alert alert-light" role="alert" align="center">
                    Todas as Categorias
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Beleza e Saúde Feminina']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/BelezaeSaudeFeminina.png" class="img_categoria"
                            alt="Beleza e Saúde Feminina">
                            
                        <div class="txtcategoria">
                            <p class="card-text">Beleza e Saúde Feminina</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Barbearia']) }}">
                    <div class="card">

                        <img src="/img/logo_categorias/barbearia.png" class="img_categoria" 
                        alt="Barbearias">
                       
                        <div class="txtcategoria">
                            <p class="card-text">Barbearias</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/costureira.png" class="img_categoria" 
                        alt="Costureiras">

                        <div class="txtcategoria">
                            <p class="card-text">Costureiras</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/tatuagem.png" class="img_categoria" 
                        alt="Estúdio de tatuagem">

                        <div class="txtcategoria">
                            <p class="card-text">Estúdio de tatuagem</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/restaurante.png" class="img_categoria" 
                        alt="Restaurantes">

                        <div class="txtcategoria">
                            <p class="card-text">Restaurantes</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/Advogado.png" class="img_categoria" 
                        alt="Advogados">

                        <div class="txtcategoria">
                            <p class="card-text">Advogados</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/Mecanico.png" class="img_categoria" 
                        alt="Mecânicos">

                        <div class="txtcategoria">
                            <p class="card-text">Mecânicos</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/engenheiros.png" class="img_categoria"
                         alt="Engenheiros">

                        <div class="txtcategoria">
                            <p class="card-text">Engenheiros</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/Jardineiros.png" class="img_categoria" 
                        alt="Jardineiros">

                        <div class="txtcategoria">
                            <p class="card-text">Jardineiros</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/Professorparticular.png" class="img_categoria"
                            alt="Professor(a) particular">

                        <div class="txtcategoria">
                            <p class="card-text">Professor(a) particular</p>
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Limpeza e higienização']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/diariesta.png" class="img_categoria" 
                        alt="Limpeza e higienização">

                        <div class="txtcategoria">
                            <p class="card-text">Limpeza e higienização</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/cuidadoradeidosos.png" class="img_categoria"
                            alt="Cuidador de Idoso">

                        <div class="txtcategoria">
                            <p class="card-text">Cuidador de Idosos</p>
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/saude.png" class="img_categoria" 
                        alt="Saúde">

                        <div class="txtcategoria">
                            <p class="card-text">Saúde</p>
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/Marketing.png" class="img_categoria"
                            alt="Consultoria">

                        <div class="txtcategoria">
                            <p class="card-text"> Consultoria</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="">
                    <div class="card">
                        <img src="/img/logo_categorias/personal.png" class="img_categoria" alt="Personal trainers">

                        <div class="txtcategoria">
                            <p class="card-text"> Personal trainers</p>
                        </div>
                    </div>
                </a>

            </div>










        </div>
    </div>






@endsection
