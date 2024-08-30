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
        Schema::create('consultas_medicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('personas');
            $table->foreignId('examen_fisico_id')->constrained('examen_fisico');
            $table->text('motivo_consulta');
            $table->text('diagnostico');
            $table->text('tratamiento');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_medicas');
    }
};
