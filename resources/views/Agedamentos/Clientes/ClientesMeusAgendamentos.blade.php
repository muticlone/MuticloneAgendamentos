@extends('Layout.main')

@section('title', 'Meus Agendamentos')

@section('conteudo')



    <x-meu_agendamentos-clientes />


    <div class="col-md-12 offset-md-0 pt-3">
        <div class="row g-12">

            @if (count($agendamentos) > 0)
                <x-meus_agendamentos_clientes :agendamentos="$agendamentos"
                :empresaAgendamento="$empresaAgendamento"
                :NomesDasEmpresas="$NomesDasEmpresas"
                :formaDepagamentoAgendamento="$formaDepagamentoAgendamento"
                :numerosDosPedidos="$numerosDosPedidos"
                search="{{ $search  }}"
                searchdate="{{ $searchdate }}"

                />
            @else
                <x-verifica-cliente-atendimento :status="$statuses" />
            @endif

        </div>



        <x-pagination :paginatedItems="$agendamentos" />
    </div>

    <script src="/js/Atualizar.js"></script>

@endsection
