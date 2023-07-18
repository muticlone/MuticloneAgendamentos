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
        Schema::create('cadastro_de_servicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeServico');
            $table->decimal('valorDoServico', 8, 2);
            $table->time('horario_incial_atedimento');
            $table->time('horario_final_atedimento');
            $table->string('duracaohoras');
            $table->string('duracaominutos');
            $table->text('descricaosevico');
            
            $table->string('imageservico');
            $table->foreignId('cadastro_de_empresas_id')->constrained();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastro_de_servicos');
    }
};
