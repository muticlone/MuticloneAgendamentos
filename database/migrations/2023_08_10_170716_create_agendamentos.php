<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('nomeServiçoAgendamento');
            $table->json('duracaohorasAgendamento');
            $table->json('valorUnitatioAgendamento');
            $table->string('formaDepagamentoAgendamento');
            $table->decimal('valorTotalAgendamento', 8, 2);
            $table->dateTime('dataHorarioAgendamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
