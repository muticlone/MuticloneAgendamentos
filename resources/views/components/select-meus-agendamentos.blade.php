<div>
    @props(['agendamento' => '', 'width' => '', 'nome' => 'Busque pelo nome do cliente', 'value' => []])




    <select class="js-buscacategoria select2 form-select select-meus-agendamentos" data-placeholder="{{ $nome }}" style="width: {{ $width }}%" name="search">
        <option value="" disabled selected>{{ $nome }}</option>

        @if (is_array($value) || is_object($value))
        @foreach ($value as $optionValue)
            <option class="custom-option img-flag" value="{{ $optionValue }}">{{ $optionValue }}</option>
        @endforeach
    @endif
    </select>
</div>

<script src="/js/select2.js"></script>
