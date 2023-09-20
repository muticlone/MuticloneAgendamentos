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
        Schema::table('cadastro_de_empresas', function (Blueprint $table) {
            $table->float('metaDeFaturamento')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cadastro_de_empresas', function (Blueprint $table) {
            $table->dropColumn('metaDeFaturamento');
        });
    }
};
