<div>
   @props(['ico'=>'','tema'=>'' , 'info'=> ''])

   <div class="description-block">
    <span class="info-box-number">
        <div class="info-box cards">
            <span class="info-box-icon bg-info"><i class="{{ $ico }}"></i></span>
            <div class="info-box-content ">
                <span class="info-box-text">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{ $tema }}</font>
                    </font>
                </span>
                <span class="info-box-number">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">{{ $info}}
                        </font>
                    </font>
                </span>
            </div>
        </div>
    </span>
</div>
</div>
