<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $casts = [
        'nomeServiçoAgendamento' => 'array',
        'duracaohorasAgendamento' => 'array',
        'duracaominutosAgendamento' => 'array',
        'valorUnitatioAgendamento' => 'array',
    ];

    protected $fillable = [
        'nomeServiçoAgendamento',
        'duracaohorasAgendamento',
        'duracaominutosAgendamento',
        'valorUnitatioAgendamento',
        'formaDepagamentoAgendamento',
        'valorTotalAgendamento',
        'dataHorarioAgendamento',
        'user_id',
        'cadastro_de_empresas_id',
        'numeroDoPedido'




    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }



}
