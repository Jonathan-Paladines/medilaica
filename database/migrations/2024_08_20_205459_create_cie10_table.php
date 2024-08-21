<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCie10Table extends Migration
{
    public function up()
    {
        Schema::create('cie10', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->string('detalle_cie', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cie10');
    }
}
