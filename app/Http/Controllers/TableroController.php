<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tablero;
use App\Models\Residencia;

class TableroController extends Controller
{
    public function index()
    {
        return view('tablero.index');
    }

    public function store(Request $request,$id){
        $request->validate([
            'texto' => 'required'
        ]);

        $tablero = Tablero::create([
            'residencia_id' => $id,
            'autor_id' => \Auth::user()->id,
            'tipo' => 'texto',
            'texto' => $request->texto,
        ]);

        return redirect()->back()->with("message","Contenido agregado");
    }
}
