<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciaTable extends Migration
{
    public function up()
    {
        Schema::create('residencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas');
            $table->string('pais', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->text('domicilio')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('residencia');
    }
};
