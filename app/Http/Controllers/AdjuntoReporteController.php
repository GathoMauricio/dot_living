<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdjuntoReporte;

class AdjuntoReporteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ruta' => 'required|mimes:jpg,jpeg,png,mp4',
            'descripcion' => 'required'
        ]);
        $max_size = (int)ini_get('upload_max_filesize') * 10240;
        $ruta_completa = $request->file('ruta')->store('public/adjunto_reportes');
        $partes = explode('/', $ruta_completa);
        $nombre_imagen = $partes[2];

        $adjunto = AdjuntoReporte::create([
            'autor_id' => $request->autor_id,
            'reporte_id' => $request->reporte_id,
            'ruta' => $nombre_imagen,
            'descripcion' => $request->descripcion,
            'mimetype' => $request->file('ruta')->getClientMimeType(),
        ]);

        if ($adjunto) {
            return redirect()->route('detalle_reportes', $request->reporte_id)->with('message', 'El adjunto se creó con éxito.');
        }
    }
}
