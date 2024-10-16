<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tablero;
use App\Models\Residencia;
use App\Models\Habitacion;

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

    public function apiIndexNotificaciones()
    {
        $habitacion = Habitacion::where('residente_id', \Auth::user()->id)->first();
        if ($habitacion) {
            $notificaciones = Tablero::where('residencia_id', $habitacion->residencia_id)->orderBy('id', 'DESC')->get();
            return response()->json([
                'error' => 0,
                'data' => $notificaciones,
            ]);
        } else {
            return response()->json([
                'error' => 0,
                'data' => [],
            ]);
        }
    }

    public function apiShowNotificacion(Request $request)
    {
        $notificacion = Tablero::find($request->notificacion_id);
        return response()->json([
            'error' => 0,
            'data' => $notificacion,
        ]);
    }
}
