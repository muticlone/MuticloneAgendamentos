@extends('Layout.main')

@section('title', 'Dashboard')

@section('conteudo')


    @php
        $pago = true;
    @endphp

    @if ($pago)



        <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/" class="btn btn-sm btn-outline-info btndashboardservico">Home</a>



                <a href="/cadastrar/empresa" class="btn btn-sm btn-outline-info btndashboardservico">Cadastrar nova
                    empresa</a>


            </div>
        </div>

        <div class="col-lg-5 col-sm-12 col-md-12 pt-2">
            <form action="#" method="GET" id="searchForm">

                <x-select-empresa-home :empresa="$empresa" nome="Busque por suas empresas" />
            </form>
        </div>




        @if (count($empresa) > 0)
            @if ($search)
                <div class="pt-2">
                    <div class="alert alert-success" role="alert">
                        Buscando por: "{{ $search }}" <a href="/dashboard">Visualizar todas as suas empresas</a>
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Meus negócios</th>

                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresa as $emp)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td class="tabelas">
                                    <div class="list-group">
                                        <a class="list-group-item list-group-item-action"
                                            href="/empresas/dados/{{ $emp->id }}">
                                            <img src="/img/logo_empresas/{{ $emp->image }}" alt="{{ $emp->nomeServico }}"
                                                class="imgtabela">
                                            {{ $emp->nomeFantasia }}
                                        </a>
                                    </div>
                                </td>
                                <td>

                                    <a href="/dashboard/edit/{{ $emp->id }}"
                                        class="btn btn-sm btn-outline-warning btndashboard  btnDashoard"<x-svg-edit
                                        width="14" height="14" margin="3px" />

                                    </a>
                                    {{--
                                <a href="#" class="btn btn-sm btn-outline-danger btndashboard bt btnDashoard"


                                    <x-svg-deletar width="14" height="14" margin="3px" />

                                </a> --}}

                                    <a href="{{ route('dados.meus.clientes', ['id' => $emp->id, 'status' => 'ativos']) }}"
                                        class="btn btn-sm btn-outline-info btndashboard  btnDashoard" <x-svg-meus-clientes
                                        width="14" height="14" margin="3px" />
                                    </a>

                                    <a href="/dados/servicos/{{ $emp->id }}"
                                        class="btn btn-sm btn-outline-info btndashboard  btnDashoard" <x-svg-meusservicos
                                        width="14" height="14" margin="3px" />
                                    </a>


                                    <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $emp->id, 'status' => 'ativos']) }}"
                                        class="btn btn-sm btn-outline-warning btndashboardservico  btnDashoard">


                                        <x-svg-meus-agendamentos width="14" height="14" margin="3px" />
                                    </a>


                                    @if ($temagendamentos)
                                        <a href="{{ route('agenda.business', ['id' => $emp->id]) }}"
                                            class="btn btn-sm btn-outline-info btndashboardservico btnDashoard">

                                            <x-svgCalendardatefill nome="Agenda" width="14" height="14"
                                                margin="3px" />
                                        </a>
                                        <a href="{{ route('dashboard.business', ['id' => $emp->id]) }}"
                                            class="btn btn-sm btn-outline-info btndashboardservico btnDashoard">

                                            <x-svg-dashboard width="14" height="14" margin="3px" />

                                        </a>
                                    @endif




                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            {{-- paginação --}}

            <x-pagination :paginatedItems="$empresa" />
        @else
            <!-- Se não houver empresas, exiba alguma mensagem de aviso ou tratamento adequado -->
            @if ($search)
                <div class="alert alert-warning" role="alert">
                    A busca não localizou nenhuma empresas cadastradas com nome de: "{{ $search }}" <a
                        href="/dashboard">Visualizar todas as suas empresas</a>
                </div>
            @endif


        @endif
    @else
        <div align="center">
            <h2>Desbloqueie Todo o Potencial com Nossos Planos</h2>
            <p>
                Está pronto para levar sua gestão empresarial a um novo patamar? Nossos planos estão prontos para atender às
                suas necessidades, seja você um empreendedor iniciante ou uma empresa em crescimento. Escolha o plano que
                melhor
                se adapta ao seu negócio e veja as portas da eficiência e produtividade se abrirem.

            </p>
        </div>



        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center pt-3 ">
            <x-assinaturas NomeDoPlano="Básico" valorDoPlano="49,90" tempo="/mês" btn="Assine o plano básico" />
            <x-assinaturas NomeDoPlano="Pro" valorDoPlano="79,90" tempo="/mês" btn="Assine pro" />
            <x-assinaturas NomeDoPlano="Vip" valorDoPlano="149,90" tempo="/mês" btn="Assine o plano vip" />

            <x-assinaturas NomeDoPlano="Basico Semestral" valorDoPlano="269,90" tempo="/semestre" btn="Assine o plano básico" />
            <x-assinaturas NomeDoPlano="Pro Semestral" valorDoPlano="499,90" tempo="/semestre" btn="Assine o plano Pro semestral" />
            <x-assinaturas NomeDoPlano="Vip Semestral" valorDoPlano="829,90" tempo="/semestre" btn="Assine o plano vip semestral" />

            <x-assinaturas NomeDoPlano="Basico anual" valorDoPlano="539,90" tempo="/ano" btn="Assine o plano básico anual" />
            <x-assinaturas NomeDoPlano="Pro anual" valorDoPlano="999,90" tempo="/ano" btn="Assine o plano Pro anual" />
            <x-assinaturas NomeDoPlano="Vip anual" valorDoPlano="1699,90" tempo="/ano" btn="Assine o plano Vip anual" />

        </div>

        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th style="width: 34%;"></th>
                        <th style="width: 22%;">Basico</th>
                        <th style="width: 22%;">Pro</th>
                        <th style="width: 22%;">vip</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Empresas</th>
                        <td>1</td>
                        <td>2</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Funcionários</th>
                        <td>1</td>
                        <td>5</td>
                        <td>8</td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Produtos em destaque</th>
                        <td>x</td>
                        <td>x</td>
                        <td>v</td>
                    </tr>
                    {{-- <tr>
              <th scope="row" class="text-start">Sharing</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Unlimited members</th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row" class="text-start">Extra security</th>
              <td></td>
              <td></td>
              <td></td>
            </tr> --}}
                </tbody>
            </table>
        </div>
        <div>


            <h6 align="center">Plano Básico</h6>

            <p>
                Ao assinar nosso plano básico, você terá direito a cadastrar uma empresa e contar com um funcionário. Ideal
                para
                empreendedores individuais que desejam dar os primeiros passos no mundo dos negócios. Não deixe sua visão
                limitada
                pela falta de recursos, comece aqui e expanda com confiança.
            </p>

            <h6 align="center">Plano Pro</h6>
            <p>
                Se você precisa gerenciar mais de uma empresa e busca uma equipe maior, nosso plano pro é a escolha
                perfeita.
                Com
                ele, você pode cadastrar até 2 empresas e ter até 5 funcionários. Aumente sua capacidade de operação e
                melhore a
                eficiência de seus processos sem preocupações.
            </p>
            <h6 align="center"> Plano VIP</h6>

            <p>
                Para os visionários que estão prontos para alcançar o topo, nosso plano VIP é a solução definitiva. Aqui,
                você pode cadastrar até 5 empresas e contar com uma equipe de até 8 funcionários. Além disso, as empresas
                cadastradas no plano VIP recebem destaque exclusivo nas páginas do nosso site, aumentando sua visibilidade e
                oportunidades de negócios. Liberte seu potencial, deixe sua criatividade florescer e alcance o
                reconhecimento que sua empresa merece.
            </p>

            <p>
                Independentemente do plano que você escolher, estamos comprometidos em fornecer as ferramentas e recursos
                necessários para o sucesso do seu negócio. Não perca tempo, faça sua escolha e comece a transformar sua
                visão em
                realidade hoje mesmo.
            </p>


            <h6 align="center">
                Assine agora e abra as portas para um futuro empresarial de sucesso!
            </h6>
        </div>




    @endif










    <script src="/js/Tooltips.js"></script>

@endsection
