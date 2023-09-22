<div>
    @props(['Porcentagemdepedidoscancelados' => '', 'quantidadedepedidoscacenlados' => '', 'link' => ''])




    <div class="small-box bg-info">
        <div class="inner">
            <h3>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">{{ $Porcentagemdepedidoscancelados }} </font>
                </font>

            </h3>

            <p>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;"> cancelados: {{ $quantidadedepedidoscacenlados }}</font>
                </font>

            </p>



        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ $link }}" class="small-box-footer">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    Mais informações</font>
            </font><i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>




</div>
