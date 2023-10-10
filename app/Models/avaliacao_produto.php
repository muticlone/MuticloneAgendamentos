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
        'usuario_id',
        'business_id',
        'agendamentoID',





    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function cadastro_de_empresa(){
        return $this->belongsTo('App\Models\cadastro_de_empresa');
    }
    public function Agendamento(){
        return $this->belongsTo('App\Models\Agendamento');
    }

}
