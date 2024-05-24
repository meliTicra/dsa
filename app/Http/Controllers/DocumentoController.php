<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentoModel;
use App\Models\ProcedenciaModel;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = DocumentoModel::all();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $procedencias = ProcedenciaModel::all();
        return view('formulario', compact('procedencias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nro' => 'required|string',
            'fecha' => 'required|date',
            'procedencia' => 'required|exists:procedencia,id',
            'nroCarta' => 'required|string',
            'detalle' => 'required|string',
        ]);

        $documento = new DocumentoModel();
        $documento->nro = $request->input('nro');
        $documento->fecha = $request->input('fecha');
        $documento->id_procedencia = $request->input('procedencia');
        $documento->numero_carta_o_prov = $request->input('nroCarta');
        $documento->detalle = $request->input('detalle');
        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento creado exitosamente.');
    }

    public function edit($id)
    {
        $documento = DocumentoModel::findOrFail($id);
        $procedencias = ProcedenciaModel::all();
        return view('documentos.edit', compact('documento', 'procedencias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nro' => 'required|string',
            'fecha' => 'required|date',
            'procedencia' => 'required|exists:procedencia,id',
            'nroCarta' => 'required|string',
            'detalle' => 'required|string',
        ]);

        $documento = DocumentoModel::findOrFail($id);
        $documento->nro = $request->input('nro');
        $documento->fecha = $request->input('fecha');
        $documento->id_procedencia = $request->input('procedencia');
        $documento->numero_carta_o_prov = $request->input('nroCarta');
        $documento->detalle = $request->input('detalle');
        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $documento = DocumentoModel::findOrFail($id);
        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento eliminado exitosamente.');
    }
}
