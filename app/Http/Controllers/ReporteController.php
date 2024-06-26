<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\TipoReporte;
use App\Models\EstatusReporte;
use App\Models\AdjuntoReporte;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Residente')) {
            $reportes = Reporte::where('residente_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
        }

        if (Auth::user()->hasRole('Auditor')) {

            $reportes = Reporte::leftJoin('users', 'users.id', 'reportes.residente_id')
                ->leftJoin('residencias', 'users.id', 'residencias.id')
                ->orderBy('residencias.id', 'DESC')
                ->paginate(15);
        }

        if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Super usuario')) {
            $reportes = Reporte::orderBy('id', 'DESC')->paginate(15);
        }

        return view('reportes.index', compact('reportes'));
    }

    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);
        $estatuses = EstatusReporte::all();
        return view('reportes.show', compact('reporte', 'estatuses'));
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

    public function cambiarEstatus(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->estatus_id = $request->estatus_id;
        if ($reporte->save()) {
            return redirect()->back()->with('message', 'El estatus se actualizo con éxito.');
        }
    }
}
