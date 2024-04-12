<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutaDestinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruta_destino', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_procedencia')->unsigned();
            $table->bigInteger('id_documento')->unsigned();
            $table->timestamps();
        
            // Definir las claves foráneas
            $table->foreign('id_procedencia')->references('id')->on('procedencia');
            $table->foreign('id_documento')->references('id')->on('documento');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruta_destino');
    }
}