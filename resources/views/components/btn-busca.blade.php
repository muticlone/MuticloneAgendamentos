<div>
    @props(['idbtn'=> '' , 'name'=> ''])
    <div class="input-group mb-3 pt-2">
        <input type="search" class="form-control" id="{{ $idbtn }}" name="{{ $name }}" placeholder="Procurar...">
        <button class="btn btn-outline-secondary custom-btn" type="submit">
            <ion-icon name="search-outline" class="iconCentralizar"></ion-icon>
            Buscar
        </button>
    </div>
</div>
