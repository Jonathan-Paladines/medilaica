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
        Schema::table('personas', function (Blueprint $table) {
            // Cambiar el tipo de columna `ecivil` de `enum` a `varchar`
            $table->string('ecivil', 20)->change();
            // Cambiar el tipo de columna `tsangre` de `enum` a `varchar`
            $table->string('tsangre', 20)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personas', function (Blueprint $table) {
            // Revertir el cambio de tipo de columna `ecivil` de `varchar` a `enum`
            $table->enum('ecivil', ['Soltero', 'Casado', 'Viudo', 'Divorciado', 'Unión Libre'])->change();
            // Revertir el cambio de tipo de columna `tsangre` de `varchar` a `enum`
            $table->enum('tsangre', ['A(+)', 'A(-)', 'O(+)', 'O(-)', 'AB(+)', 'AB(-)', 'B(+)', 'B(-)', 'N/S'])->change();
        
        });
    }
};
