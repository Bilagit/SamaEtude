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
        Schema::create('exercices', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('contenu');
            $table->unsignedBigInteger('idProfesseur');
            $table->unsignedBigInteger('idCours');
            $table->foreign('idProfesseur')->references('id')->on('professeurs');
            $table->foreign('idCours')->references('id')->on('cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercices');
    }
};
