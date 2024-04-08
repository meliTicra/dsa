<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->id('id_documento');
            $table->timestamps();
            $table->string('nombre-procedencia');
            $table->string('numero_carta_o_prov');
            $table->text('detalle');
            $table->string('imagen')->nullable(); // Columna para la ruta de la imagen
            
            // Definir la restricción de clave foránea
            $table->foreign('nombre-procedencia')->references('id')->on('procedencia');
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
