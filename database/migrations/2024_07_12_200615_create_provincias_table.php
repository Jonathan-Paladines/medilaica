<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration

{
    
    /**
     * Run the migrations.
     */
    public function up()
        {
        Schema::create('tbl_provincia', function (Blueprint $table) {
            $table->id();
            $table->text('tbl_provincia');
            $table->timestamps();
        });

        // DB::table('tbl_provincia')->insert([
        //     ['id' => 1, 'provincia' => 'Azuay'],
        //     ['id' => 2, 'provincia' => 'Bolívar'],
        //     ['id' => 3, 'provincia' => 'Cañar'],
        //     ['id' => 4, 'provincia' => 'Carchi'],
        //     ['id' => 5, 'provincia' => 'Cotopaxi'],
        //     ['id' => 6, 'provincia' => 'Chimborazo'],
        //     ['id' => 7, 'provincia' => 'El Oro'],
        //     ['id' => 8, 'provincia' => 'Esmeraldas'],
        //     ['id' => 9, 'provincia' => 'Guayas'],
        //     ['id' => 10, 'provincia' => 'Imbabura'],
        //     ['id' => 11, 'provincia' => 'Loja'],
        //     ['id' => 12, 'provincia' => 'Los Ríos'],
        //     ['id' => 13, 'provincia' => 'Manabi'],
        //     ['id' => 14, 'provincia' => 'Morona Santiago'],
        //     ['id' => 15, 'provincia' => 'Napo'],
        //     ['id' => 16, 'provincia' => 'Pastaza'],
        //     ['id' => 17, 'provincia' => 'Pichincha'],
        //     ['id' => 18, 'provincia' => 'Tungurahua'],
        //     ['id' => 19, 'provincia' => 'Zamora Chinchipe'],
        //     ['id' => 20, 'provincia' => 'Galápagos'],
        //     ['id' => 21, 'provincia' => 'Sucumbíos'],
        //     ['id' => 22, 'provincia' => 'Orellana'],
        //     ['id' => 23, 'provincia' => 'Santo Domingo'],
        //     ['id' => 24, 'provincia' => 'Santa Elena'],
        //     ['id' => 25, 'provincia' => 'Zonas no delimitadas']
        //                 // Agrega los demás valores aquí...
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
