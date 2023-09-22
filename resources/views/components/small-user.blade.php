<div>
    @props(['tema' => '', 'txt' => '', 'link' => '','icon'=>''])
    <div class="small-box bg-info">
        <div class="inner">
            <h3> {{ $tema }}</h3>
            <p>{{ $txt }}</p>
        </div>
        <div class="icon">

            <i class="{{ $icon }}"></i>
        </div>
        <a href="{{ $link }}"
            class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
