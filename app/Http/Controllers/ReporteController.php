<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\TipoReporte;
use App\Models\AdjuntoReporte;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::paginate(15);
        return view('reportes.index', compact('reportes'));
    }

    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('reportes.show', compact('reporte'));
    }

    public function create()
    {
        $tipo_reportes = TipoReporte::orderBy('nombre')->get();
        return view('reportes.create', compact('tipo_reportes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_id' => 'required',
            'descripcion' => 'required',
        ], [
            'tipo_id.required' => 'Campo obligatorio',
            'descripcion.required' => 'Campo obligatorio',
        ]);

        $reporte = Reporte::create([
            'estatus_id' => 1,
            'residente_id' => Auth::user()->id,
            'tipo_id' => $request->tipo_id,
            'descripcion' => $request->descripcion,
        ]);

        if ($request->file('file_ruta')) {
            $max_size = (int)ini_get('upload_max_filesize') * 10240;

            $rutas = $request->file('file_ruta');
            $contador = 0;
            foreach ($rutas as $ruta) {
                $ruta_completa = $ruta->store('public/adjunto_reportes');
                $partes = explode('/', $ruta_completa);
                $nombre_imagen = $partes[2];

                AdjuntoReporte::create([
                    'autor_id' => Auth::user()->id,
                    'reporte_id' => $reporte->id,
                    'ruta' => $nombre_imagen,
                    'descripcion' => $request->file_descripcion[$contador],
                    'mimetype' => $ruta->getClientMimeType(),
                ]);
                $contador++;
            }
        }

        if ($reporte) {
            return redirect()->route('reportes')->with('message', 'El reporte se creó con éxito.');
        }
    }
}
