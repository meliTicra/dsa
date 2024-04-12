<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Procedencia; // Asegúrate de importar el modelo adecuado

class CreateProcedenciaTable extends Migration


{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //carreras, Facultades, otros
        Schema::create('procedencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_procedencia')->unique(); // Agregar restricción unique
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedencia');
    }
}