<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantonesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_canton', function (Blueprint $table) {
            $table->id();
            $table->text('canton');
            $table->unsignedBigInteger('id_provincia');
            $table->timestamps();

            $table->foreign('id_provincia')
                  ->references('id')->on('tbl_provincia')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cantones');
    }
};
