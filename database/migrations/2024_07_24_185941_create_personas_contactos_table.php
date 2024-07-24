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
        Schema::create('personas_contactos', function (Blueprint $table) {
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('contacto_id')->constrained('contactos')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['persona_id', 'contacto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas_contactos');
    }
};
