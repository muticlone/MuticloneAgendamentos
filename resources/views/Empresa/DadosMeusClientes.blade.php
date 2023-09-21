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
                    @foreach ( $clientesOrdenados as $cliente)
                        <tr>

                            <td> {{ $cliente->name }}</td>


                            <td>
                                @foreach ($dadosClientes as $dados)
                                    @if ($dados['user_id'] == $cliente->id)
                                        {{ \Carbon\Carbon::createFromFormat('d/m/Y', $dados['updated_at'])->format('d-m-Y') }}
                                    @endif
                                @endforeach
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
