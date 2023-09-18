@extends('Layout.main')

@section('title', 'Dashboard')

@section('conteudo')





    <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="/" class="btn btn-sm btn-outline-info btndashboardservico">Home</a>



            <a href="/cadastrar/empresa" class="btn btn-sm btn-outline-info btndashboardservico">Cadastrar nova empresa</a>
            @foreach ($empresa as $empid)
            @endforeach


        </div>
    </div>

    <div class="col-lg-5 col-sm-12 col-md-12 pt-2">
        <form action="#" method="GET" id="searchForm">

            <x-select-empresa-home :empresa="$empresa" nome="Busque"/>
        </form>
    </div>




    @if (count($empresa) > 0)
        @if ($search)
            <div class="alert alert-success" role="alert">
                Buscando por: "{{ $search }}" <a href="/dashboard">Visualizar todas as suas empresas</a>
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
                                    class="btn btn-sm btn-outline-warning btndashboard bt btnDashoard"

                                    <x-svg-edit width="14" height="14" margin="3px" />

                                </a>
                                {{--
                                <a href="#" class="btn btn-sm btn-outline-danger btndashboard bt btnDashoard"


                                    <x-svg-deletar width="14" height="14" margin="3px" />

                                </a> --}}

                                <a href="/dados/servicos/{{ $emp->id }}"
                                    class="btn btn-sm btn-outline-info btndashboard bt btnDashoard"

                                    <x-svg-meusservicos width="14" height="14" margin="3px" />
                                </a>


                                <a href="{{ route('meus.clientes.agendamentos.empresa', ['id' => $emp->id, 'status' => 'ativos']) }}"
                                    class="btn btn-sm btn-outline-warning btndashboardservico bt btnDashoard">


                                    <x-svg-meus-agendamentos width="14" height="14" margin="3px" />
                                </a>

                                @if($temagendamentos)
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












    <script src="/js/Tooltips.js"></script>
    <script src="/js/select2.js"></script>
@endsection
