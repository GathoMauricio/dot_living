<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversacion;
use App\Models\Mensaje;

class ConversacionController extends Controller
{
    public function index()
    {
        if (\Auth::user()->hasRole('Residente')) {
            $conversaciones = Conversacion::where('residente_id', \Auth::user()->id)->paginate(10);
        }
        if (\Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Super usuario')) {
            $conversaciones = Conversacion::paginate(10);
        }
        return view('conversaciones.index', compact('conversaciones'));
    }

    public function store(Request $request)
    {
        $conversacion = Conversacion::create([
            'residente_id' => \Auth::user()->id,
            'asunto' => $request->asunto,
        ]);

        if ($conversacion) {
            return redirect()->route('conversacion', $conversacion->id)->with('message', 'La conversación se creó con éxito.');  //mandar a conversación
        }
    }

    public function show($id)
    {
        $conversacion = Conversacion::find($id);
        return view('conversaciones.show', compact('conversacion'));
    }

    public function storeMensaje(Request $request)
    {
        $mensaje = Mensaje::create([
            'conversacion_id' => $request->conversacion_id,
            'usuario_id' => \Auth::user()->id,
            'tipo' => 'texto',
            'texto' => $request->texto,
        ]);
        if ($mensaje) {
            return redirect()->back()->with('message', 'El mensaje se guardo con éxito.'); //mandar a conversación
        }
    }
}
