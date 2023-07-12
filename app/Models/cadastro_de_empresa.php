<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadastro_de_empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'cnpj_cpf',
        'razaoSocial',
        'nomeFantasia',
        'telefone',
        'celular',
        'cep',
        'logradouro',
        'numero_endereco',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'area_atuacao',
        'image',
        'descricao',
        'user_id',
       
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
