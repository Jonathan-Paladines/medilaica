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
        Schema::create('personas_vacunas', function (Blueprint $table) {
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('vacuna_id')->constrained('vacunas')->onDelete('cascade');
            $table->integer('numero_dosis')->required();
            $table->date('fecha_vacuna')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();

            $table->primary(['persona_id', 'vacuna_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas_vacunas');
    }
};
