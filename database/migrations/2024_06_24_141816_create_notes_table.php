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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->float('score');
            $table->unsignedBigInteger('idExercice');
            $table->unsignedBigInteger('idEtudiant');
            $table->foreign('idExercice')->references('id')->on('exercices');
            $table->foreign('idEtudiant')->references('id')->on('etudiants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
