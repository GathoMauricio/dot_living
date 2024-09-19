<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaHabitacion;

class MediaHabitacionController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'required|mimes:jpg,jpeg,png',
            'descripcion' => 'required'
        ]);

        $ruta_completa = $request->file('imagen')->store('public/habitaciones');
        $partes = explode('/', $ruta_completa);
        $nombre_imagen = $partes[2];

        $medio = MediaHabitacion::create([
            'habitacion_id' => $id,
            'ruta' => $nombre_imagen,
            'descripcion' => $request->descripcion,
        ]);

        if ($medio) {
            return redirect()->route('detalle_habitaciones', $id)->with('message', 'El medio en la habitacion ' . $medio->habitacion->alias . ' se creó con éxito.');
        }
    }

    public function destroy($id)
    {
        $medio = MediaHabitacion::find($id); // Value is not URL but directory file path
        if (\File::exists('storage/habitaciones/' . $medio->ruta)) {
            \File::delete('storage/habitaciones/' . $medio->ruta);
        }
        $habitacion_id = $medio->habitacion->id;
        $alias = $medio->habitacion->alias;
        if ($medio->delete()) {
            return redirect()->route('detalle_habitaciones', $habitacion_id)->with('message', 'El medio en la habitacion ' . $alias . ' se eliminó con éxito.');
        }
    }

}
