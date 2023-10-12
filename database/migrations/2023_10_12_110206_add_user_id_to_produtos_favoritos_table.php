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
        Schema::table('produtos_favoritos', function (Blueprint $table) {

            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idProduto');

            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idProduto')->references('id')->on('cadastro_de_servicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos_favoritos', function (Blueprint $table) {

            $table->dropForeign(['idUsuario']);
            $table->dropForeign(['idProduto']);
        });
    }
};
