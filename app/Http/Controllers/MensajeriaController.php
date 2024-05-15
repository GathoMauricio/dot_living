<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensajeria;

class MensajeriaController extends Controller
{
    public function index()
    {
        $mensajes = Mensajeria::all();
        return view('mensajeria.index', compact('mensajes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required'
        ]);

        $mensaje = Mensajeria::create([
            'autor_id' => \Auth::user()->id,
            'receptor_id' => \Auth::user()->habitacion->residencia->auditor->id,
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
