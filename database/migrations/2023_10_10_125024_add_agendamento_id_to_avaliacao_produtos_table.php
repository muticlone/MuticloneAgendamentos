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
        Schema::table('avaliacao_produtos', function (Blueprint $table) {

            $table->unsignedBigInteger('agendamentoID');
            $table->foreign('agendamentoID')->references('id')->on('agendamentos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avaliacao_produtos', function (Blueprint $table) {
            $table->dropForeign(['agendamentoID']);
        });
    }
};
