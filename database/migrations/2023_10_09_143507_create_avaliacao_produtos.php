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
        Schema::create('avaliacao_produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('idServicos');
            $table->text("comentario")->nullable();
            $table->float('nota')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_produtos');
    }
};