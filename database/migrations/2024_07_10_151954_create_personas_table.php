<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 20);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->date('fnacimiento');
            $table->enum('ecivil', ['Soltero', 'Casado', 'Viudo', 'Divorciado', 'Unión Libre']);
            $table->string('genero', 10);
            $table->enum('tsangre', ['A(+)', 'A(-)', 'O(+)', 'O(-)', 'AB(+)', 'AB(-)', 'B(+)', 'B(-)', 'N/S']);
            $table->string('etnia', 50)->nullable();
            $table->string('nacionalidad', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
