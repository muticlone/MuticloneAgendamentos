<div>
    @props(['media' => '' , 'dadosuser'=> []])

    <nav class="w-100 pt-2">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab"
                aria-controls="product-desc" aria-selected="true">Média</a>
            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments"
                role="tab" aria-controls="product-comments" aria-selected="false">Avaliações</a>

        </div>
    </nav>
    <div class="tab-content p-3 coment" id="nav-tabContent">
        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
            <input id="input-6" name="input-6" class="rating rating-loading pt-br" value="{{ $media }}"
                data-min="0" data-max="5" data-step="0.1" data-readonly="true" data-show-clear="false">
        </div>
        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
            <div class="list-group-item">
                @foreach ( $dadosuser as $user )
                    <p>{{ $user['nome'] }}</p>
                    <input id="input-6" name="input-6" class="rating rating-loading pt-br"
                    value="{{ $user['nota'] }}" data-min="0" data-max="5" data-step="0.1"
                    data-readonly="true" data-size="xs" data-show-clear="false">
                @endforeach


            </div>



        </div>

    </div>

    <script src="/js/Cometarios_e_Avaliacoes.js"></script>


</div>
