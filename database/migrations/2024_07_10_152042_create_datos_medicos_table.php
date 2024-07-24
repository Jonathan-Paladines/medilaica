<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosMedicosTable extends Migration
{
    public function up()
    {
        Schema::create('datos_medicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas');
            $table->enum('vacuna', ['Pfizer', 'Astrazeneca', 'Sinovac', 'Cansino', 'Janssen', 'Moderna', 'Otro'])->nullable();
            $table->tinyInteger('numvacuna')->nullable();
            $table->text('alergia')->nullable();
            $table->text('antepersonales')->nullable();
            $table->text('antequirurgico')->nullable();
            $table->text('antefamiliares')->nullable();
            $table->text('obsficha')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datos_medicos');
    }
};
