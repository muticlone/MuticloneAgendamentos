<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cadastro_de_servico extends Model
{
    use HasFactory;
 

   

    protected $casts = [
        'formaDePagamento' => 'array'
    ];



    protected $fillable = [
        'nomeServico',
        'valorDoServico',
        'horario_incial_atedimento',
        'horario_final_atedimento',
        'duracaohoras',
        'duracaominutos',
        'descricaosevico',
        'formaDePagamento',
        'imageservico',
        'cadastro_de_empresas_id',

       
    ];

    public function userEmpresa(){
        return $this->belongsTo('App\Models\cadastro_de_empresa');
    }


}
