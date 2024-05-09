<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoReporte;

class SeguimientoReporteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'autor_id' => 'required',
            'reporte_id' => 'required',
            'texto' => 'required',
        ]);

        $seguimiento = SeguimientoReporte::create([
            'autor_id' => $request->autor_id,
            'reporte_id' => $request->reporte_id,
            'texto' => $request->texto,
        ]);

        if ($seguimiento) {
            return redirect()->route('detalle_reportes', $request->reporte_id)->with('message', 'El seguimiento se creó con éxito.');
        }
    }
}
