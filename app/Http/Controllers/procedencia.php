<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\procedencia; // Asegúrate de importar el modelo correcto

class ProcedenciaController extends Controller
{
    // Mostrar todas las carreras y facultades
    
    public function create()
    {
        $procedencia = procedencia::all();
        return view('formulario', ['procedencia' => $procedencia]);
    }

    // Otros métodos del controlador, como store, update, delete, etc., según sea necesario
}
