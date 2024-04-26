<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tablero;
use App\Models\Residencia;

class TableroController extends Controller
{
    // public function index($id)
    // {
    //     if (\Auth()->user()->hasRole('Administrador') || \Auth()->user()->hasRole('Super usuario')) {
    //         $tableros = Tablero::where('tablero_id', $id)->paginate(10);
    //     }

    //     return view('tablero.index', compact('tableros'));
    // }

    public function store(Request $request, $id)
    {
        $request->validate([
            'texto' => 'required'
        ]);

        $tablero = Tablero::create([
            'residencia_id' => $id,
            'autor_id' => \Auth::user()->id,
            'tipo' => 'texto',
            'texto' => $request->texto,
        ]);

        if ($request->file('imagen')) {
            $ruta_completa = $request->file('imagen')->store('public/tableros');
            $partes = explode('/', $ruta_completa);
            $nombre_imagen = $partes[2];
            $tablero->tipo = 'media';
            $tablero->imagen = $nombre_imagen;
            $tablero->save();
        }

        return redirect()->back()->with("message", "Contenido agregado");
    }
}
