<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RutaDestinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruta_destino', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_procedencia');
            $table->unsignedBigInteger('id_documento');
            $table->timestamps();

            // Definir las restricciones de clave foránea
            $table->foreign('id_procedencia')->references('id')->on('2024_04_04_215852_create_procedencia_table');
            $table->foreign('id_documento')->references('id')->on('2024_04_04_221102_documento_table');
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
