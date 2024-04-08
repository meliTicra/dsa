<?php

namespace App\Http\Controllers;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DocumentoController extends Controller
{
    // Mostrar todos los documentos
    public function index()
    {
        $documentos = Documento::all();
        return response()->json($documentos);
    }
    
    // Mostrar el formulario para crear un nuevo documento
    public function create()
    {
        // Este método podría no ser necesario en una API
    }

    // Almacenar un nuevo documento
    public function store(Request $request)
    {
        // Definir reglas de validación
        $rules = [
            'nro' => 'required',
            'fecha' => 'required|date',
            'procedencia' => 'required|exists:procedencia,id', // Asumiendo que la tabla se llama "procedencias"
            'nroCarta' => 'required', // Ajustado al nombre del campo en el formulario
            'detalle' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'id_procedencia.exists' => 'El id_procedencia especificado no existe en la tabla procedencia.',
        ];

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), $rules, $messages);

        // Si la validación falla, devolver errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 es el código de estado para datos no procesables
        }
        // Procesar la imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->extension(); // Nombre único para la imagen
            $image->move(public_path('images'), $imageName); // Mover la imagen a la carpeta de almacenamiento
            $validatedData['imagen'] = 'images/' . $imageName; // Guardar la ruta de la imagen en la base de datos
        }

        // Crear un nuevo documento con los datos validados
        $documento = Documento::create($validatedData);

        return response()->json(['message' => 'Documento creado correctamente'], 201);

        // Si la validación pasa, continuar con el almacenamiento del documento
        // Tu lógica de almacenamiento aquí
        $documento = new Documento();
        $documento->nro = $request->nro;
        $documento->fecha = $request->fecha;
        $documento->procedencia_id = $request->procedencia; // Asumiendo que hay una relación con la tabla "procedencias"
        $documento->nro_carta = $request->nroCarta;
        $documento->detalle = $request->detalle;
        
        $documento->save();

        return response()->json(['message' => 'Documento creado correctamente'], 201);
    }


    // Mostrar un documento específico
    public function show($id){
        $documento = Documento::find($id);
        return response()->json($documento);
    }

    // Mostrar el formulario para editar un documento
    public function edit($id)
    {
        // Este método podría no ser necesario en una API
    }

    // Actualizar un documento específico
    public function update(Request $request, $id)
    {
        // Definir reglas de validación
        $rules = [
            'nro' => 'required',
            'fecha' => 'required|date',
            'id_procedencia' => 'required|exists:procedencia,id', // Verifica que el id_procedencia exista en la tabla procedencia
            'numero_carta_o_prov' => 'required',
            'detalle' => 'required',
        ];

        // Definir mensajes de error personalizados
        $messages = [
            'id_procedencia.exists' => 'El id_procedencia especificado no existe en la tabla procedencia.',
        ];

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), $rules, $messages);

        // Si la validación falla, devolver errores
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 es el código de estado para datos no procesables
        }

        // Si la validación pasa, continuar con la actualización del documento
        // Tu lógica de actualización aquí

        return response()->json(['message' => 'Documento actualizado correctamente']);
    }

    

    // Eliminar un documento específico
    public function destroy($id)
    {
        $documento = Documento::find($id);
        $documento->delete();

        return response()->json(['message' => 'Documento eliminado correctamente']);
    }
}



