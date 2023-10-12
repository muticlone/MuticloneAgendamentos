@extends('Layout.main')

@section('title', 'Dashboard')

@section('conteudo')
    <!-- estilos do AdminLTE -->


    <div class="col-md-10 offset-md-1 pt-1 ">
        <div class="row g-12">



            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 "align="center">


                <img src="/img/logo_servicos/{{ $servico->imageservico }}" class="img-fluid  img_dados_empresa"
                    alt="{{ $servico->nomeServico }}">

                @if ($dadosFavoritos['favorito']<1)


                <form id="FormularioProdutoFavorito" action="{{ route('produto.favoritos') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idservico" value="{{ encrypt($servico->id) }}" />
                    <x-favoritos value="{{ $dadosFavoritos['favorito'] }}"/>
                </form>
                @else
                <form id="FormularioProdutoFavoritodrop" action="{{ route('produto.favoritos.drop') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="idservico" value="{{ encrypt($servico->id) }}" />
                    <x-favoritos-drop value="{{ $dadosFavoritos['favorito'] }}"/>
                </form>

                @endif

                <x-commen-tratings-servicos media="{{ $dados['media'] }}" :dadosuser="$dadosuser" />




            </div>







            <div class="col-lg-6 col-sm-12 col-md-12 pt-2 ">

                <div class="card">
                    <h5 class="card-header">{{ ucfirst(strtolower($servico->nomeServico)) }}</h5>
                    <div class="card-body">


                        <p class="card-text txt_dados_empresa">{{ ucfirst(strtolower($servico->descricaosevico)) }}</p>
                        <h5 class="card-title">R$ {{ number_format($servico->valorDoServico, 2, ',', '.') }}</h5>
                        <h5 class="card-title">Formas de Pagamento</h5>
                        <ul id="items-list">
                            @foreach ($empresa->formaDePagamento as $formadepagamento)
                                <li>
                                    <div class="listadepagamentos">
                                        @if ($formadepagamento == 'Dinheiro')
                                            <x-dinheiro width="20" height="20" margin="5px" />
                                        @elseif($formadepagamento == 'Pix')
                                            <x-pix width="20" height="20" margin="5px" />
                                        @elseif($formadepagamento == 'Cartão de débito')
                                            <x-cartao-de-depito width="20" height="20" margin="5px" />
                                        @elseif($formadepagamento == 'Cartão de crédito')
                                            <x-cartao_credito width="20" height="20" margin="5px" />
                                        @elseif($formadepagamento == 'Boleto')
                                            <x-boleto width="20" height="20" margin="5px" />
                                        @elseif($formadepagamento == 'Vale-refeição')
                                            <x-vale_refeicao width="20" height="20"margin="5px" />
                                        @endif



                                        <samp>{{ $formadepagamento }}</samp>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('cadastrar.agendamentoprodutouncio', ['id' => $servico->id]) }}"
                            class="btn btn-primary">Agendar</a>

                        <p class="card-text pt-2">Prestadora do serviço:

                            <a class="card-text" href="/empresas/dados/{{ $servico->cadastro_de_empresas_id }}"
                                class=" rounded float-end vertical-align-middle mx-1" data-bs-toggle="tooltip"
                                data-bs-placement="bottom"
                                data-bs-title="Clique para mais informações sobre a empresa {{ $empresa->nomeFantasia }}">


                                {{ $empresa->nomeFantasia }}
                                <img src="/img/logo_empresas/{{ $empresa->image }}" class="img-fluid  img_logoDadosServico"
                                    alt="{{ $empresa->razaoSocial }}">
                            </a>

                        </p>


                        <x-contato nome="Contato" telefone="{{ $empresa->telefone }}" celular="{{ $empresa->celular }}"
                            Whatsapp="{{ $numeroCelular = str_replace(['-', ' '], '', $empresa->celular) }}" />







                    </div>

                </div>



            </div>











        </div>
    </div>





@endsection
