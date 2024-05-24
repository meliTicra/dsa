<?php

namespace App\Http\Controllers;

use App\Models\ProcedenciaModel;
use Illuminate\Http\Request;

class ProcedenciaController extends Controller
{
    public function index()
    {
        $procedencias = ProcedenciaModel::all();
        return view('procedencias.index', compact('procedencias'));
    }

    public function create()
    {
        return view('procedencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_procedencia' => 'required|string|max:255',
        ]);

        ProcedenciaModel::create($request->all());
        return redirect()->route('procedencias.index');
    }

    public function show($id)
    {
        $procedencia = ProcedenciaModel::find($id);
        return view('procedencias.show', compact('procedencia'));
    }

    public function edit($id)
    {
        $procedencia = ProcedenciaModel::find($id);
        return view('procedencias.edit', compact('procedencia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_procedencia' => 'required|string|max:255',
        ]);

        $procedencia = ProcedenciaModel::find($id);
        $procedencia->update($request->all());
        return redirect()->route('procedencias.index');
    }

    public function destroy($id)
    {
        ProcedenciaModel::find($id)->delete();
        return redirect()->route('procedencias.index');
    }
}
