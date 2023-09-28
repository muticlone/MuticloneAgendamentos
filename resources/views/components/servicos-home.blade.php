<div>
    @props(['servico_id' => '', 'servico_imageservico' => '','servico_nomeServico'=>'',
    'servico_valorDoServico' => '' , 'descricaoservico' =>'', 'media' => ''
    ])


                <a href="/servicos/dados/{{ $servico_id }}" class="card-header">
                    <div class="novohomeservico">
                        <div align="center">



                            <img src="/img/logo_servicos/{{ $servico_imageservico }}" class=" img_tela_home"
                                alt="">


                            <div class="pt-1">
                                <input id="input-6" name="input-6" class="rating rating-loading pt-br"
                                    value="{{ $media }}" data-min="0" data-max="5" data-step="0.1"
                                    data-readonly="true" data-show-clear="false" data-size="xs">
                            </div>

                        </div>

                        <style>
                            .text-justify {
                              text-align: justify;
                              font-size: 22px
                          }
                      </style>

                        <h2 class="fw-normal text-center">{{ ucfirst($servico_nomeServico) }} </h2>
                        <h5> R${{ $servico_valorDoServico }}</h6>

                        <p class="text-justify">{{  ucfirst($descricaoservico) }}</p>

                    </div>
                </a>
                <a href="/servicos/dados/{{ $servico_id }}" class="btn btn-sm btn-primary btg">Detalhes</a>




</div>
