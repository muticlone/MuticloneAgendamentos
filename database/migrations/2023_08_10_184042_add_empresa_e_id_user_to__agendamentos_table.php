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
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('cadastro_de_empresas_id')->constrained();
            $table->string('NomeUser');
            $table->string('celularUser');
            $table->string('emailUser');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('user_id_empresa')
            ->constrained()
            ->onDelete('cascade');
            $table->dropColumn('NomeUser');
            $table->dropColumn('celularUser');
            $table->dropColumn('emailUser');
            
        });
    }
};
