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
        Schema::table('notes', function (Blueprint $table) {
            // Supprimer la nouvelle clé étrangère
            $table->dropForeign(['idExercice']);

            // Ajouter l'ancienne clé étrangère
            $table->foreign('idExercice')
                  ->references('id')
                  ->on('exo_soumis')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            // Supprimer la nouvelle clé étrangère
            $table->dropForeign(['idExercice']);

            // Ajouter l'ancienne clé étrangère
            $table->foreign('idExercice')
                  ->references('id')
                  ->on('exercices')
                  ->onDelete('cascade');
        });
    }
};
