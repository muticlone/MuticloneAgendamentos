<div>
    @props(['empresa'=> '' ,'width' => ''])


    <select id="select-empresaHome" class="js-buscacategoria select2 form-select"
    data-placeholder="Selecione um serviço"  style="width: {{ $width }}%" name="search">
        <option value="" disabled selected>Busque por uma empresa</option>
        @foreach ($empresa as $empresaBusca)
            <option class="custom-option img-flag" value="{{$empresaBusca->nomeFantasia }}" data-img-src="/img/logo_empresas/{{ $empresaBusca->image }}">{{ $empresaBusca->nomeFantasia }}</option>
        @endforeach
    </select>


</div>
