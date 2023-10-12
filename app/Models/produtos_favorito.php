<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos_favorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'favoritoProtudo',
        'idUsuario',
        'idProduto',
    ];

    public function sevicosfavorito()
    {
        return $this->hasMany('App\Models\cadastro_de_servico');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'idUsuario');
    }
}
