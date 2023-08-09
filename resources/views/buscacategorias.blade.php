@extends('Layout.main')

@section('title', 'Categoria')

@section('conteudo')


    <div class="col-md-12 offset-md-0 pt-3">
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
                            <p class="card-text describuscacategoria">Elevando a Beleza e Promovendo o Bem-Estar na Jornada da Saúde Feminina.</p>
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
                            <p class="card-text describuscacategoria">Tradição e estilo únicos em cortes e barbas, onde a maestria do design se une. </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Costureira']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/costureira.png" class="img_categoria" 
                        alt="Costureiras">

                        <div class="txtcategoria">
                            <p class="card-text">Costureiras</p>
                            <p class="card-text describuscacategoria">Ajustes Impecáveis para elegância masculina e Feminina.</p>

                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Estúdio de tatuagem']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/tatuagem.png" class="img_categoria" 
                        alt="Estúdio de tatuagem">

                        <div class="txtcategoria">
                            <p class="card-text">Estúdio de tatuagem</p>
                            <p class="card-text describuscacategoria">Transformando histórias em arte, trazendo vida à pele.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Restaurantes']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/restaurante.png" class="img_categoria" 
                        alt="Restaurantes">

                        <div class="txtcategoria">
                            <p class="card-text">Restaurantes</p>
                            <p class="card-text describuscacategoria">Delícias culinárias que encantam a cada mordida.</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Advogado']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/Advogado.png" class="img_categoria" 
                        alt="Advogados">

                        <div class="txtcategoria">
                            <p class="card-text">Advogados</p>
                            <p class="card-text describuscacategoria">Justiça e dedicação: defendendo seus direitos com determinação.</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Mecânico']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/Mecanico.png" class="img_categoria" 
                        alt="Mecânicos">

                        <div class="txtcategoria">
                            <p class="card-text">Mecânicos</p>
                            <p class="card-text describuscacategoria">Reparos precisos e performance: Sua máquina em ótimas mãos.</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Engenheiro']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/engenheiros.png" class="img_categoria"
                         alt="Engenheiros">

                        <div class="txtcategoria">
                            <p class="card-text">Engenheiros</p>
                            <p class="card-text describuscacategoria">Inovando soluções, construindo o futuro.</p>
                         
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Jardineiro']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/Jardineiros.png" class="img_categoria" 
                        alt="Jardineiros">

                        <div class="txtcategoria">
                            <p class="card-text">Jardineiros</p>
                            <p class="card-text describuscacategoria">Transformando jardins em obras de arte, um toque de natureza em cada canto.</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Professor(a) particular']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/Professorparticular.png" class="img_categoria"
                            alt="Professor(a) particular">

                        <div class="txtcategoria">
                            <p class="card-text">Professor(a) particular</p>
                            <p class="card-text describuscacategoria"> Expandindo horizontes através do conhecimento</p>
                          
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
                            <p class="card-text  describuscacategoria"> Limpeza e higienização: cuidando do seu espaço com zelo e qualidade</p>
                           
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Cuidador de Idosos']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/cuidadoradeidosos.png" class="img_categoria"
                            alt="Cuidador de Idoso">

                        <div class="txtcategoria">
                            <p class="card-text">Cuidador de Idosos</p>
                            <p class="card-text  describuscacategoria">Cuidando com carinho e respeito: a companhia que os idosos merecem.</p>
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Saúde']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/saude.png" class="img_categoria" 
                        alt="Saúde">

                        <div class="txtcategoria">
                            <p class="card-text">Saúde</p>
                            <p class="card-text  describuscacategoria"> Promovendo bem-estar e saúde com profissionalismo e empatia.</p>
                           
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Consultoria']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/Marketing.png" class="img_categoria"
                            alt="Consultoria">

                        <div class="txtcategoria">
                            <p class="card-text"> Consultoria</p>
                            <p class="card-text  describuscacategoria"> Transformando desafios em oportunidades: sua parceria rumo ao sucesso.</p>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-sm-6 col-md-6  pt-1 ">
                <a href="{{ route('busca.sevico.categorias', ['categoria' => 'Personal trainers']) }}">
                    <div class="card">
                        <img src="/img/logo_categorias/personal.png" class="img_categoria" alt="Personal trainers">

                        <div class="txtcategoria">
                            <p class="card-text">Personal trainers</p>
                            <p class="card-text  describuscacategoria">Alcance seu potencial máximo: treinamento personalizado para resultados incríveis. </p>
                        </div>
                    </div>
                </a>

            </div>










        </div>
    </div>






@endsection
