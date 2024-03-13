<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\EstatusPago;
use App\Models\TipoPago;
use App\Models\User;


class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::orderBy('id', 'DESC')->paginate(15);
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $estatuses = EstatusPago::get();
        $tipos = TipoPago::get();
        $residentes = [];
        foreach (User::get() as $user) {
            if ($user->hasRole('Residente'))
                $residentes[] = $user;
        }
        return view('pagos.create', compact('estatuses', 'tipos', 'residentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estatus_id' => 'required',
            'residente_id' => 'required',
            'tipo_id' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required',
        ], [
            'estatus_id.required' => 'Este campo es obligatorio',
            'residente_id.required' => 'Este campo es obligatorio',
            'tipo_id.required' => 'Este campo es obligatorio',
            'descripcion.required' => 'Este campo es obligatorio',
            'fecha.required' => 'Este campo es obligatorio',
            'cantidad.required' => 'Este campo es obligatorio',
        ]);

        $pago = Pago::create([
            'estatus_id' => $request->estatus_id,
            'residente_id' => $request->residente_id,
            'tipo_id' => $request->tipo_id,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'cantidad' => $request->cantidad,
        ]);

        if ($request->file('comprobante')) {
            $ruta_completa = $request->file('comprobante')->store('public/comprobantes');
            $partes = explode('/', $ruta_completa);
            $nombre_comprobante = $partes[2];
            $pago->comprobante = $nombre_comprobante;
            $pago->save();
        }

        if ($pago) {
            return redirect()->route('pagos')->with('message', 'El pago se creó con éxito.');
        }
    }

    public function cargarCantidad(Request $request)
    {
        $residente = User::find($request->residente);
        $tipo = TipoPago::find($request->tipo);
        if ($residente->habitacion->residencia_id) {
            switch ($tipo->nombre) {
                case 'Depósito':
                    return response()->json([
                        'cantidad' => $residente->habitacion->deposito,
                        'descripcion' => 'Depósito de la habitación ' . $residente->habitacion->alias . ', en la residencia ' . $residente->habitacion->residencia->nombre,
                    ]);
                    break;
                case 'Renta':
                    return response()->json([
                        'cantidad' => $residente->habitacion->renta,
                        'descripcion' => 'Renta de la habitación ' . $residente->habitacion->alias . ', en la residencia ' . $residente->habitacion->residencia->nombre,
                    ]);
                    break;
                default:
                    return response()->json([
                        'cantidad' => 0,
                        'descripcion' => '',
                    ]);
                    break;
            }
        } else {
            return response()->json([
                'cantidad' => 0,
                'descripcion' => '',
            ]);
        }
    }
}
