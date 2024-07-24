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
            $table->string('telefono1', 20)->nullable()->after('nacionalidad');
            $table->string('telefono2', 20)->nullable()->after('telefono1');
            $table->string('correo1', 100)->nullable()->after('telefono2');
            $table->string('correo2', 100)->nullable()->after('correo1');
            $table->string('nacionalidad', 50)->nullable()->change();
            $table->string('pais_residencia', 100)->nullable()->after('correo2');
            $table->string('provincia_residencia', 100)->nullable()->after('pais_residencia');
            $table->string('ciudad_residencia', 100)->nullable()->after('provincia_residencia');
            $table->string('domicilio', 255)->nullable()->after('ciudad_residencia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropColumn('telefono1');
            $table->dropColumn('telefono2');
            $table->dropColumn('correo1');
            $table->dropColumn('correo2');
            $table->dropColumn('pais_residencia');
            $table->dropColumn('provincia_residencia');
            $table->dropColumn('ciudad_residencia');
            $table->dropColumn('domicilio');
            $table->string('nacionalidad', 50)->nullable(false)->change();
        });
    }
};
