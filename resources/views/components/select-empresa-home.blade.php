<div>
    @props(['empresa'=> '' ,'width' => '' , 'nome'=> 'Busque por uma empresa'])


    <select id="select-empresaHome" class="js-buscacategoria select2 form-select"
    data-placeholder="{{ $nome }}"  style="width: {{ $width }}%" name="search">
        <option value="" disabled selected>{{ $nome }}</option>
        @foreach ($empresa as $empresaBusca)
            <option class="custom-option img-flag" value="{{$empresaBusca->nomeFantasia }}" data-img-src="/img/logo_empresas/{{ $empresaBusca->image }}">{{ $empresaBusca->nomeFantasia }}</option>
        @endforeach
    </select>


</div>
<script src="/js/select2.js"></script>
