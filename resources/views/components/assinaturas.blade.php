<div>
    @props(['NomeDoPlano'=>'' , 'valorDoPlano' , 'btn'=> '','tempo'=>''])


        <div class="col pt-1 ">
            <div class="card mb-4 rounded-4 shadow-lg">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">{{ $NomeDoPlano }}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R${{ $valorDoPlano }}<small class="text-body-secondary text-sm fs-6 fw-light">{{ $tempo }}</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">

                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">{{ $btn }}</button>
                </div>
            </div>
        </div>



</div>
