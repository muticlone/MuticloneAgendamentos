<div>
    @props(['tema' => '' ,'idgrafico' => ''])

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{ $tema }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            <canvas id="{{ $idgrafico }}"
                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 367px;"
                width="734" height="500" class="chartjs-render-monitor"></canvas>
        </div>

    </div>
</div>
