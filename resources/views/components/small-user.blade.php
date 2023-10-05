<div>
    @props(['tema' => '', 'txt' => '', 'link' => '','icon'=>'' ,'btntxt' => 'Mais informação ' ,
    'tamanhoFonte' => '40' ,'txt2' => ''])
    <div class="small-box bg-info">
        <div class="inner">
            <h3 style="font-size: {{ $tamanhoFonte }}px;"> {{ $tema }}</h3>
            <p >{{ $txt }}</p>
            <p>{{ $txt2 }}</p>
        </div>
        <div class="icon">

            <i class="{{ $icon }}"></i>
        </div>
        <a href="{{ $link }}"
            class="small-box-footer">
            {{ $btntxt }} <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
