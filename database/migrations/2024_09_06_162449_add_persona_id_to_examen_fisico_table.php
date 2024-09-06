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
        Schema::table('examen_fisico', function (Blueprint $table) {
                // Agrega la columna persona_id como clave foránea
                $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('examen_fisico', function (Blueprint $table) {
            // Elimina la columna persona_id
            $table->dropForeign(['persona_id']);
            $table->dropColumn('persona_id');
        });
    }
};
