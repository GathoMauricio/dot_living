<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensajeria;
use App\Models\Habitacion;
use Illuminate\Support\Facades\Auth;

class MensajeriaController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Residente') && isset(Auth::user()->habitacion->id)) {
            $mensajes = Mensajeria::where('habitacion_id', Auth::user()->habitacion->id)->paginate(15);
        } else {
            $mensajes = Mensajeria::where('habitacion_id', 0)->paginate(15);
        }
        return view('mensajeria.index', compact('mensajes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required'
        ]);

        $mensaje = Mensajeria::create([
            //'habitacion_id' => Habitacion::where('residente_id', Auth::user()->id)->first()->id,
            'habitacion_id' => $request->habitacion_id,
            'autor_id' => Auth::user()->id,
            'tipo' => 'texto',
            'texto' => $request->texto,
        ]);

        if ($request->file('imagen')) {
            $ruta_completa = $request->file('imagen')->store('public/mensajerias');
            $partes = explode('/', $ruta_completa);
            $nombre_imagen = $partes[2];
            $mensaje->tipo = 'media';
            $mensaje->imagen = $nombre_imagen;
            $mensaje->save();
        }

        return redirect()->back()->with("message", "Contenido agregado");
    }
}
