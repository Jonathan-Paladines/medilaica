<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('datos_medicos_alergias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datos_medicos_id');
            $table->unsignedBigInteger('alergia_id');
            $table->foreign('datos_medicos_id')->references('id')->on('datos_medicos')->onDelete('cascade');
            $table->foreign('alergia_id')->references('id')->on('detalle_alergia')->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_medicos_alergias');
    }
};
