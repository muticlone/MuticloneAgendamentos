<div>
    @props(['numero' => '', 'mensagem' => '' ,'detalhes'=>'' , 'idempresa' => ''])

    <a href="https://wa.me/55{{ str_replace(['(', ')', ' ', '-'], '', $numero) }}?text={{ $mensagem }}"
        class="btn  btn-outline-success btnwhts  btn-sm rounded float-end vertical-align-middle  btnMeusClientes "
        data-bs-toggle="tooltip" data-bs-placement="bottom"
        title=""  target="_blank">
        <x-svg-Whatsapp width="10" height="10" margin="2px"/>
        Whatsapp
     </a>
     <a href="{{ route('dados.meu.cliente', ['id' => $detalhes, 'idempresa' => $idempresa]) }}" class="btn btn-sm btn-outline-info btndashboard rounded float-end vertical-align-middle btnMeusClientes  ">

        Detalhes

    </a>

</div>
