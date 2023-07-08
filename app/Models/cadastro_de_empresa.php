<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadastro_de_empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'cnpj',
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
       
    ];
}
