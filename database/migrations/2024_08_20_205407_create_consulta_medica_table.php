<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaMedicaTable extends Migration
{
    public function up()
    {
        Schema::create('consulta_medica', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_de_consulta', 255);
            $table->text('enfermedad_actual')->nullable();
            $table->text('tratamiento')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consulta_medica');
    }
}
