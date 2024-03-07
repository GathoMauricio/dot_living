<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaResidencia;

class MediaResidenciaController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'required|mimes:jpg,jpeg,png',
            'descripcion' => 'required'
        ]);

        $ruta_completa = $request->file('imagen')->store('public/residencias');
        $partes = explode('/', $ruta_completa);
        $nombre_imagen = $partes[2];

        $medio = MediaResidencia::create([
            'residencia_id' => $id,
            'ruta' => $nombre_imagen,
            'descripcion' => $request->descripcion,
        ]);

        if ($medio) {
            return redirect()->route('detalle_residencias', $id)->with('message', 'El medio en la residencia ' . $medio->residencia->nombre . ' se creó con éxito.');
        }
    }

    public function destroy($id)
    {
        $medio = MediaResidencia::find($id); // Value is not URL but directory file path
        if (\File::exists('storage/residencias/' . $medio->ruta)) {
            \File::delete('storage/residencias/' . $medio->ruta);
        }
        $residencia_id = $medio->residencia->id;
        $nombre = $medio->residencia->nombre;
        if ($medio->delete()) {
            return redirect()->route('detalle_residencias', $residencia_id)->with('message', 'El medio en la residencia ' . $nombre . ' se creó con eliminó.');
        }
    }
}
