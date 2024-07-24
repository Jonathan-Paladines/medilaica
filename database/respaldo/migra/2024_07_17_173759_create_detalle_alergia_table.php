<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_alergia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_alergia_id')->constrained('tipo_alergia')->onDelete('cascade');
            $table->string('nomalergia', 100);
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_alergia');
    }
};
