<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ConfiguracionController extends Controller
{
    public function apiGuardarFirma(Request $request)
    {
        $firma = $request->firma;
        $firma = str_replace('data:image/png;base64,', '', $firma);
        $firma = str_replace(' ', '+', $firma);
        $ruta = '/app/public/firma_usuario/';
        $usuario = User::find(\Auth::user()->id);

        if ($usuario) {
            $usuario->fecha_contrato = date('Y-m-d');
            $usuario->firma = 'firma_usuario_' . $usuario->id . '.png';
            $usuario->save();
            \File::put(storage_path($ruta . 'firma_usuario_' . $usuario->id . '.png'), base64_decode($firma));
            return response()->json([
                'estatus' => 1,
                'mensaje' => 'Firma almacenada'
            ]);
        }
    }
}
