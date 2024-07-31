<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeguimientoAmenidad;
use Illuminate\Support\Facades\Auth;

class SeguimientoAmenidadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amenidad_id' => 'required',
            'texto' => 'required',
        ]);

        $seguimiento = SeguimientoAmenidad::create([
            'autor_id' => Auth::user()->id,
            'amenidad_id' => $request->amenidad_id,
            'texto' => $request->texto,
        ]);

        if ($seguimiento) {
            return redirect()->route('detalle_amenidad', $request->amenidad_id)->with('message', 'El seguimiento se creó con éxito.');
        }
    }
}
