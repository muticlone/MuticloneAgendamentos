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
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tikTok')->nullable();
            $table->string('site')->nullable();
            $table->string('linkedin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cadastro_de_empresas', function (Blueprint $table) {
            $table->dropColumn('instagram');
            $table->dropColumn('youtube');
            $table->dropColumn('facebook');
            $table->dropColumn('tikTok');
            $table->dropColumn('site');
            $table->dropColumn('linkedin');
            });
    }
};
