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
        Schema::create('cadastro_de_empresas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cnpj');
            $table->string('razaoSocial');
            $table->string('nomeFantasia')->nullable();
            $table->string('telefone');
            $table->string('celular')->nullable();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero_endereco');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastro_de_empresa');
    }
};
