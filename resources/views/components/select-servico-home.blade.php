<div>
    @props(['servico'=> '' ,'width' => ''])


    <select id="select-servicoHome" class="js-buscacategoria select2 form-select"
    data-placeholder="Selecione um serviço" style="width: {{ $width }}%" name="search">
        <option value="" disabled selected>Busque por um serviço</option>
        @foreach ($servico as $servicobusca)
            <option class="custom-option img-flag" value="{{ $servicobusca->nomeServico }}" data-img-src="/img/logo_servicos/{{ $servicobusca->imageservico }}">{{ $servicobusca->nomeServico }}</option>
        @endforeach
    </select>




</div>
