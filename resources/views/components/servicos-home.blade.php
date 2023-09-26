<div>
    @props(['servico_id' => '', 'servico_imageservico' => '','servico_nomeServico'=>'',
    'servico_valorDoServico' => '',
    ])



    <div class="col-auto pt-2">
        <a href="/servicos/dados/{{ $servico_id }}" class="card-link link">
            <div class="card cardlayout ">

                <img src="/img/logo_servicos/{{ $servico_imageservico }}" class=" img_tela_home" class="img-logo"
                    alt="{{ $servico_nomeServico }}">


                <div class="image-and-rating">


                    <input id="input6" name="input-6" class="rating rating-loading pt-br" value="5"
                        data-min="0" data-max="5" data-step="0.1" data-readonly="true" data-show-clear="false"
                        data-size="xs">


                </div>







                <div class="card-body nomedosevico">
                    <p class="card-text" align="center">
                        {{ ucfirst($servico_nomeServico) }}

                    </p>




                    <div class="input-group mb-3">
                        {{-- <span class="input-group-text"  style="background-color: white;">
                            <img src="/img/logo_empresas/58ed5041085b65964678454b433e15ce.png" alt=""
                            class="imgtabela">
                        </span> --}}

                        <input type="text" name="valorTotalAgendamento" id="valorTotal"
                            class="form-control campodesablitado mascValor" value="{{ $servico_valorDoServico }}">


                    </div>




                    <a href="/servicos/dados/{{ $servico_id }}" class="btn btn-sm  btn-primary btg ">


                        Agendar



                    </a>




                </div>
            </div>
        </a>
    </div>


</div>
