<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAlergiasTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_alergias', function (Blueprint $table) {
            $table->id();
            $table->string('nomalergia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_alergias');
    }
}

