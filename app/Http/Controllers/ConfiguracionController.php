<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contrato;

class ConfiguracionController extends Controller
{
    public function apiGuardarFirma(Request $request)
    {
        $firma = $request->firma;
        $firma = str_replace('data:image/png;base64,', '', $firma);
        $firma = str_replace(' ', '+', $firma);
        $ruta = '/app/public/firma_usuario/';
        $usuario = User::find(\Auth::user()->id);
        $contrato = Contrato::find($request->contrato_id);
        if ($usuario && $contrato) {
            $usuario->fecha_contrato = date('Y-m-d');
            $usuario->firma = 'firma_usuario_' . $usuario->id . '.png';
            $usuario->save();
            $contrato->firma = 'firma_usuario_' . $usuario->id . '.png';
            $contrato->estatus = 'Firmado';
            $contrato->save();
            \File::put(storage_path($ruta . 'firma_usuario_' . $usuario->id . '.png'), base64_decode($firma));
            return response()->json([
                'estatus' => 1,
                'mensaje' => 'Firma almacenada'
            ]);
        }
    }

    public function apiIndexComtratos(Request $request)
    {
        $contratos = Contrato::where('residente_id', \Auth::user()->id)->get();
        return response()->json([
            'estatus' => 1,
            'data' => $contratos
        ]);
    }

    public function apiShowComtrato(Request $request)
    {
        $contrato = Contrato::with('residente')->with('habitacion')->find($request->contrato_id); //->with('residente')->with('habitacion');
        return response()->json([
            'estatus' => 1,
            'data' => $contrato
        ]);
    }
}
