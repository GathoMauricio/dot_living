<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\TipoReporte;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::paginate(15);
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        $tipo_reportes = TipoReporte::orderBy('nombre')->get();
        return view('reportes.create', compact('tipo_reportes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_id' => 'required',
            'descripcion' => 'required',
        ], [
            'tipo_id.required' => 'Campo obligatorio',
            'descripcion.required' => 'Campo obligatorio',
        ]);

        $reporte = Reporte::create([
            'estatus_id' => 1,
            'residente_id' => Auth::user()->id,
            'tipo_id' => $request->tipo_id,
            'descripcion' => $request->descripcion,
        ]);

        if ($reporte) {
            return redirect()->route('reportes')->with('message', 'El reporte se creó con éxito.');
        }
    }
}
