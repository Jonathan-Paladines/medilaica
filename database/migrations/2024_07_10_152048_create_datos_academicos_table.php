<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosAcademicosTable extends Migration
{
    public function up()
    {
        Schema::create('datos_academicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas');
            $table->string('lugartrabajo', 100)->nullable();
            $table->string('profesion', 100)->nullable();
            $table->enum('facultad', ['Facultad de Administración', 'Facultad de Educación', 'Facultad de Ingeniería Industria y Construcción', 'Facultad de Ciencias Sociales y Derecho', 'Posgrado', 'No Aplica'])->nullable();
            $table->enum('carrera', ['Administración de Empresas', 'Comercio Exterior', 'Contabilidad y Auditoría', 'Marketing', 'Comunicación', 'Derecho', 'Economía', 'Periodismo', 'Psicología', 'Educación Básica', 'Educación Inicial', 'Psicopedagogía', 'Arquitectura', 'Ingeniería Civil', 'Posgrado', 'Carreras Virtuales', 'No Aplica'])->nullable();
            $table->enum('nivel', ['Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Septimo', 'Octavo', 'Noveno', 'Décimo', 'Décimo Primero', 'Décimo Segundo', 'POSGRADO', 'No Aplica'])->nullable();
            $table->enum('tipo', ['Administrativo', 'Docente', 'Estudiante', 'Otro'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datos_academicos');
    }
};
