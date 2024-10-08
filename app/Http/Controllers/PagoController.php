<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\EstatusPago;
use App\Models\TipoPago;
use App\Models\User;
use Illuminate\Support\Facades\File;


class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::orderBy('id', 'DESC')->paginate(15);
        return view('pagos.index', compact('pagos'));
    }

    public function show($id)
    {
        $pago = Pago::find($id);
        return view('pagos.show', compact('pago'));
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

    public function edit($id)
    {
        $estatuses = EstatusPago::get();
        $tipos = TipoPago::get();
        $residentes = [];
        foreach (User::get() as $user) {
            if ($user->hasRole('Residente'))
                $residentes[] = $user;
        }
        $pago = Pago::find($id);
        return view('pagos.edit', compact('estatuses', 'tipos', 'residentes', 'pago'));
    }

    public function update(Request $request, $id)
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
        $pago = Pago::find($id);

        $pago->estatus_id = $request->estatus_id;
        $pago->residente_id = $request->residente_id;
        $pago->tipo_id = $request->tipo_id;
        $pago->descripcion = $request->descripcion;
        $pago->fecha = $request->fecha;
        $pago->cantidad = $request->cantidad;

        if ($request->file('comprobante')) {

            if (File::exists('storage/comprobantes/' . $pago->comprobante)) {
                File::delete('storage/comprobantes/' . $pago->comprobante);
            }

            $ruta_completa = $request->file('comprobante')->store('public/comprobantes');
            $partes = explode('/', $ruta_completa);
            $nombre_comprobante = $partes[2];
            $pago->comprobante = $nombre_comprobante;
        }

        if ($pago->save()) {
            return redirect()->route('pagos')->with('message', 'El pago se actualizó con éxito.');
        }
    }

    public function destroy($id)
    {
        $pago = Pago::find($id);
        if ($pago->delete()) {
            return redirect()->route('pagos')->with('message', 'El pago se eliminó con éxito.');
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

    public function cargarComprobante(Request $request)
    {
        $pago = Pago::find($request->pago_id);

        if ($request->file('comprobante')) {
            $ruta_completa = $request->file('comprobante')->store('public/comprobantes');
            $partes = explode('/', $ruta_completa);
            $nombre_comprobante = $partes[2];
            $pago->comprobante = $nombre_comprobante;
        }

        if ($pago->save()) {
            return redirect()->route('detalle_pagos', $pago->id)->with('message', 'El comprobante se cargó con éxito.');
        }
    }

    public function apiIndex(Request $request)
    {
        $pagos = Pago::where('residente_id', \Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->with('tipo')->with('estatus')->get();
        return response()->json([
            'estatus' => 1,
            'data' => $pagos
        ]);
    }

    public function apiShow(Request $request)
    {
        $pago = Pago::where('id', $request->pago_id)
            ->orderBy('id', 'DESC')
            ->with('tipo')->with('estatus')->first();
        return response()->json([
            'estatus' => 1,
            'data' => $pago
        ]);
    }

    public function apiAdjuntarComprobante(Request $request)
    {
        $archivo = $request->archivo;
        $archivo = str_replace('data:image/png;base64,', '', $archivo);
        $archivo = str_replace(' ', '+', $archivo);
        $ruta = '/app/public/comprobantes/';
        $pago = Pago::find($request->pago_id);

        if ($pago) {
            $pago->estatus_id = 1;
            $pago->comprobante = 'comprobante_pago_' . $pago->id . '.png';
            $pago->save();
            \File::put(storage_path($ruta . 'comprobante_pago_' . $pago->id . '.png'), base64_decode($archivo));
            return response()->json([
                'estatus' => 1,
                'mensaje' => 'Archivo almacenado'
            ]);
        }
    }
}
