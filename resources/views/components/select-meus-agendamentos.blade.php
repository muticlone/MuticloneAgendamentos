<div>
    @props(['agendamento' => '', 'width' => '', 'nome' => 'Busque pelo nome do cliente', 'value' => ''])


    <select  class="js-buscacategoria select2 form-select" data-placeholder="{{ $nome }}"
        style="width: {{ $width }}%" name="search">
        <option value="" disabled selected>{{ $nome }}</option>

        @php
            $nomes = json_decode($value); // Transforme a string JSON em um array PHP
        @endphp

        @foreach ($nomes as $nome)
            <option class="custom-option img-flag" value="{{ $nome }}">{{ $nome }}</option>
        @endforeach

    </select>
</div>

<script src="/js/select2.js"></script>
