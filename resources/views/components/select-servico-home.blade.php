<div>
    @props(['servico'=> '' ,'width' => '100','nome'=> 'Busque por um serviço'])


    <select id="select-servicoHome" class="js-buscacategoria select2 form-select"
    data-placeholder="{{ $nome }}" style="width: {{ $width }}%" name="search">
        <option value="" disabled selected>{{ $nome }}</option>
        @foreach ($servico as $servicobusca)
            <option class="custom-option img-flag" value="{{ $servicobusca->nomeServico }}" data-img-src="/img/logo_servicos/{{ $servicobusca->imageservico }}">{{ $servicobusca->nomeServico }}</option>
        @endforeach
    </select>




</div>
<script src="/js/select2.js"></script>
