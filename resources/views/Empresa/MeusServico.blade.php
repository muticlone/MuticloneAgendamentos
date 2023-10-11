@extends('Layout.main')

@section('title', 'SERVIÇOS')

@section('conteudo')

    <div class="row g-12">

        <div class="col-lg-12 col-sm-12 col-md-12 pt-2" align="center">
            <div class="btn-group" role="group" aria-label="Basic example">
                {{-- <a href="/" class="btn btn-sm btn-outline-info btndashboardservico">Home</a> --}}
                <a href="/dashboard" class="btn btn-sm btn-outline-info btndashboardservico">Meu negócios</a>


                <a href="/cadastro/servicos/{{ $empresa->id }}" class="btn btn-sm btn-outline-info btndashboardservico">Novo
                    serviço</a>


            </div>
        </div>
        <div class="col-lg-5 col-sm-12 col-md-12 pt-2">
            <form action="#" method="GET" id="searchForm">



                <x-select-servico-home :servico="$servicos" nome="Busque um serviço" />

            </form>


        </div>

    </div>




    @php
        $link = null;
        $link2 = 1;
    @endphp

    @foreach ($servicos as $se)
        @php
            $link = $se->cadastro_de_empresas_id;
            $link2 = $se->cadastro_de_empresas_id;
        @endphp
    @break
@endforeach

@if ($search && $link !== null)
    <div class="pt-2">
        <div class="alert alert-success" role="alert">
            Resultado da busca: "{{ $search }}"
            <a href="/dados/servicos/{{ $link }}">
                Ver todos os Serviços
            </a>
        </div>
    </div>
@elseif($search && $link == null)
    <div class="alert alert-warning" role="alert">
        Buscando por: "{{ $search }}" Nenhum resultado encontrado
        <a href="/dados/servicos/{{ $link2 }}">
            Ver todos os Serviços

        </a>
    </div>
@endif







<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th></th>
            @if (count($servicos) > 0)
                <th scope="col">Seus Serviços</th>
            @else
                <th scope="col">Você ainda não serviços </th>
            @endif



        </tr>
    </thead>
    <tbody>
        @foreach ($servicos as $servico)
            <tr>

                <td class="tabelas">
                    <div class="list-group">



                        <a class="list-group-item list-group-item-action" href="/servicos/dados/{{ $servico->id }}">
                            <img src="/img/logo_servicos/{{ $servico->imageservico }}" alt="{{ $servico->nomeServico }}"
                                class="imgtabela">
                            {{ $servico->nomeServico }}

                        </a>


                    </div>
                    </div>
                </td>
                <td>

                    <input id="mediaHomeservico" name="mediaHomeservico" class="rating rating-loading pt-br"
                        value="  {{ $servico->media }}" data-min="0" data-max="5" data-step="0.1" data-size="xs"
                        data-readonly="true" data-show-clear="false">


                </td>
                <td>

                    <div>



                        <a href="/edit/servicos/{{ $servico->id }}"
                            class="btn btn-sm btn-outline-warning btndashboardservico mr-3 btnmeusServicos">
                            {{-- editar --}}
                            <x-svg-edit width="14" height="14" margin="3px" />
                        </a>



                        <!-- Button trigger modal -->
                        <button type="button"
                            class="btn btn-sm btn-outline-danger btndashboardservico mr-3 btnmeusServicos"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-servico-id="{{ $servico->id }}">

                            <x-svg-deletar width="14" height="14" margin="3px" />
                        </button>

                        <a href="/produtos/business/{{ $servico->cadastro_de_empresas_id }}/{{ $servico->id }}"
                            class="btn btn-sm btn-outline-info btndashboardservico mr-3 btnmeusServicos">
                            {{-- detalhes --}}
                            Detalhes
                        </a>

                        </form>


                    </div>
                </td>
            </tr>
            {{-- --}}
        @endforeach
    </tbody>
</table>



<!-- Modal deletar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="servicoIdPlaceholder"></p>
            </div>
            <div class="modal-footer">

                <form id="deleteForm" action="/apagar/servicos/" method="POST">

                    <button type="button" class="btn btn-sm btn-outline-info btndashboardservico mr-3 btnmeusServicos"
                    data-bs-dismiss="modal">Cancelar

                </button>

                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="btn btn-sm btn-outline-danger btndashboardservico mr-3 btnmeusServicos">
                        {{-- apagar --}}
                        <x-svg-deletar width="14" height="14" margin="3px" />
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var servicoId = button.data('servico-id'); // Get the value of the data-servico-id attribute

        // Insert the value into the modal
        $('#servicoIdPlaceholder').text('Tem certeza que deseja excluir o produto? ' + servicoId);

        // Change the form action to include the servicoId
        $('#deleteForm').attr('action', '/apagar/servicos/' + servicoId);
    });
</script>


{{-- paginação --}}

<x-pagination :paginatedItems="$servicos" />


<script src="/js/select2.js"></script>







@endsection
