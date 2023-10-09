<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avaliacao_produto extends Model
{
    use HasFactory;


    protected $fillable = [
        'idServicos',
        'comentario',
        'nota',





    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function cadastro_de_empresa(){
        return $this->belongsTo('App\Models\cadastro_de_empresa');
    }

}
