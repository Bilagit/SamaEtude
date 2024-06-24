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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->unsignedBigInteger('idCours');
            $table->unsignedBigInteger('idetudiant');
            $table->foreign('idCours')->references('id')->on('cours');
            $table->foreign('idEtudiant')->references('id')->on('etudiants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
