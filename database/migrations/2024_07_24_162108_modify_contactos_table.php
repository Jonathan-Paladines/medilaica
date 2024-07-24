<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyContactosTable extends Migration
{
    public function up()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->string('nombre_contacto')->after('id');
            $table->string('telefono_movil')->after('nombre_contacto');
            $table->string('otro_telefono')->nullable()->after('telefono_movil');
            $table->string('parentezco')->after('otro_telefono');
            
            $table->dropColumn(['telefono1', 'telefono2', 'correo1', 'correo2']);
            $table->dropForeign(['persona_id']);
            $table->dropColumn('persona_id');
        });
    }

    public function down()
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->foreignId('persona_id')->constrained('personas');
            $table->string('telefono1', 20)->nullable();
            $table->string('telefono2', 20)->nullable();
            $table->string('correo1', 100)->nullable();
            $table->string('correo2', 100)->nullable();
            
            $table->dropColumn(['nombre_contacto', 'telefono_movil', 'otro_telefono', 'parentezco']);
        });
    }
}
