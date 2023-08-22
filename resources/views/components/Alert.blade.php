@props(['cor'=> 'warning' , 'texto'  => ''])
<div>
    <div class="pt-2">
        <div class="alert alert-{{ $cor }} pt-2" role="alert">
           {{ $texto }}
        </div>
    </div>
</div>
