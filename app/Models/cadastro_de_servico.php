<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;




class cadastro_de_servico extends Model
{
    use HasFactory;




    protected $fillable = [
        'nomeServico',
        'valorDoServico',
        'horario_incial_atedimento',
        'horario_final_atedimento',
        'duracaohoras',
        'duracaominutos',
        'descricaosevico',
        'imageservico',
        'cadastro_de_empresas_id',


    ];

    public function userEmpresa(){
        return $this->belongsTo('App\Models\cadastro_de_empresa');
    }


    public function avaliacao_produto(){
        return $this->hasMany('App\Models\avaliacao_produto');
    }

    public function produtoFavorito(){
        return $this->hasMany('App\Models\produto_favorito');
    }



}
