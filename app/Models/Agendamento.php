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
        'idServicos' => 'array',
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
        'numeroDoPedido',
        'data_hora_finalizacao_agendamento',
        'data_hora_cancelamento_agendamento',
        'idServicos',





    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function sevicos(){
        return $this->hasMany('App\Models\avaliacao');
    }




}
