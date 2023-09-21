@extends('Layout.main')




@section('title', 'Meus clientes')

@section('conteudo')
    <div class="col-md-9 offset-md-1 pt-2">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>

                        <th scope="col">Nome </th>

                        <th scope="col">Último agendamento </th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>

                            <td> {{ $cliente->name }}</td>

                            <td>{{ \Carbon\Carbon::parse($cliente->dataHorarioAgendamento)->format('d-m-Y') }}</td>

                            <td>
                                <a href="/{{ $cliente->id }}" class="btn btn-sm  btn-info ">Detalhes</a>
                            </td>
                            <td>

                                <x-btn-whatsapp numero="{{ str_replace(['(', ')', ' ', '-'], '', $cliente->phone) }}"
                                    mensagem="Olá! {{ $cliente->name }} Sentimos sua falta e estamos ansiosos para recebê-lo de volta. Como podemos ajudar você hoje?" />

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <x-pagination :paginatedItems="$clientes" />

@endsection
