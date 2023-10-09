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

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');

            // Certifique-se de que o tipo de dados corresponda ao campo 'id' na tabela 'business'.
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('cadastro_de_empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avaliacao_produtos', function (Blueprint $table) {

            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['business_id']);
        });
    }
};
