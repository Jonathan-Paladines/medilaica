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
        Schema::create('personas_alergias', function (Blueprint $table) {
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('alergia_id')->constrained('alergias')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['persona_id', 'alergia_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas_alergias');
    }
};
