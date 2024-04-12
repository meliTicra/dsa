<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_procedencia'); // Cambia a unsignedBigInteger
            $table->string('numero_carta_o_prov');
            $table->text('detalle');
            
            // Definir la restricción de clave foránea
            $table->foreign('nombre_procedencia')->references('nombre_procedencia')->on('procedencia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento');
    }
}