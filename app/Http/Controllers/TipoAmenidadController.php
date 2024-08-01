<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoAmenidad;

class TipoAmenidadController extends Controller
{
    public function store(Request $request)
    {
        TipoAmenidad::create(['nombre' => $request->nombre]);
        $tipos = TipoAmenidad::orderBy('nombre')->get();
        return response()->json($tipos);
    }
}
