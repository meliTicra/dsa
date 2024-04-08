<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedencia; // Asegúrate de importar el modelo correcto

class ProcedenciaController extends Controller
{
    // Mostrar todas las carreras y facultades
    public function index()
    {
        $procedencias = Procedencia::all(); // Recupera todas las carreras y facultades de la base de datos

        return response()->json($procedencias);
    }

    // Otros métodos del controlador, como store, update, delete, etc., según sea necesario
}
