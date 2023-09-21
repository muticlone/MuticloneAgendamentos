@extends('Layout.main')




@section('title', 'Meus clientes')

@section('conteudo')
    <div class="col-md-9 offset-md-1 pt-2">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>

                        <th scope="col">Nome </th>
                        <th scope="col">Contato</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>

                            <td> {{ $cliente->name }}</td>
                            <td>{{ $cliente->phone }}</td>
                            <td>




                                <x-btn-whatsapp numero="{{ str_replace(['(', ')', ' ', '-'], '', $cliente->phone) }}"
                                    mensagem="bom dia" />

                                </a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <x-pagination :paginatedItems="$clientes" />

@endsection
