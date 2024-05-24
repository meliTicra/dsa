<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedenciasDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedencias_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('procedencia_id');
            $table->unsignedBigInteger('documento_id');
            $table->timestamps();

            $table->foreign('procedencia_id')->references('id')->on('procedencias')->onDelete('cascade');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedencias_documentos');
    }
}