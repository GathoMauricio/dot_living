<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoReporte;

class TipoReporteController extends Controller
{

    public function index()
    {
        $tipos = TipoReporte::orderBy('nombre')->paginate(15);

        return view('tipo_reporte.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo_reporte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'Campo obligatorio'
        ]);

        $tipo = TipoReporte::create(['nombre' => $request->nombre]);

        if ($tipo) {
            return redirect()->route('tipo_reporte')->with('message', 'Registro creado.');
        }
    }

    public function edit($id)
    {
        $tipo = TipoReporte::findOrFail($id);

        return view('tipo_reporte.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'Campo obligatorio'
        ]);

        $tipo = TipoReporte::findOrFail($id);

        if ($tipo->update($request->all())) {
            return redirect()->route('tipo_reporte')->with('message', 'Registro actualizado.');
        }
    }

    public function destroy($id)
    {
        $tipo = TipoReporte::findOrFail($id);
        if ($tipo->delete()) {
            return redirect()->route('tipo_reporte')->with('message', 'Registro eliminado.');
        }
    }
}
