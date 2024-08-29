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
        Schema::create('consulta_medica', function (Blueprint $table) {
            $table->id();
            $table->text('motivo_consulta');
            $table->text('enfermedad_actual');
            $table->text('tratamiento');
            $table->foreignId('cie10_id')->constrained('cie10');
            $table->foreignId('examen_fisico_id')->constrained('examen_fisico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_medica');
    }
};
