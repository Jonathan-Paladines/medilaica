<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamposTable extends Migration
{
    public function up()
    {
        Schema::create('campos', function (Blueprint $table) {
            $table->id();
            $table->string('campo', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campos');
    }
}
