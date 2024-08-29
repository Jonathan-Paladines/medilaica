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
        Schema::create('detalle_examen_fisico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rcuerpo_oef_id')->constrained('rcuerpo_oef');
            $table->boolean('estado'); // True/False
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_examen_fisico');
    }
};
