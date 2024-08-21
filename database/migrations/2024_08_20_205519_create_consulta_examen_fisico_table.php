<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaExamenFisicoTable extends Migration
{
    public function up()
    {
        Schema::create('consulta_examen_fisico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_medica_id')->constrained('consulta_medica')->onDelete('cascade');
            $table->foreignId('campos_id')->constrained('campos')->onDelete('cascade');
            $table->foreignId('resultados_id')->constrained('resultados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consulta_examen_fisico');
    }
}
