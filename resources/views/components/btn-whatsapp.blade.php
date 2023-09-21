<div>
    @props(['numero' => '', 'mensagem' => ''])

    <a href="https://wa.me/55{{ str_replace(['(', ')', ' ', '-'], '', $numero) }}?text={{ $mensagem }}"
        class="btn btn-success btn-sm rounded float-end vertical-align-middle"
        data-bs-toggle="tooltip" data-bs-placement="bottom"
        title=""  target="_blank">
        <x-svg-Whatsapp width="20" height="20" margin="2px"/>
        Whatsapp
     </a>
</div>
