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
        Schema::create('examen_fisico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detalle_examen_fisico_id')->constrained('detalle_examen_fisico');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_fisico');
    }
};
