<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residencia;
use App\Models\Habitacion;
use App\Models\User;

class HabitacionController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::orderBy('residencia_id');
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function show($id)
    {
        $habitacion = Habitacion::find($id);
        return view('habitaciones.show', compact('habitacion'));
    }

    public function create($id)
    {
        $residencia = Residencia::find($id);
        return view('habitaciones.create', compact('residencia'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'alias' => 'required',
            'medidas' => 'required',
            'renta' => 'required|numeric',
            'deposito' => 'required|numeric',
        ], [
            'alias.required' => 'Este campo es obligatorio',
            'medidas.required' => 'Este campo es obligatorio',
            'renta.required' => 'Este campo es obligatorio',
            'renta.numeric' => 'El formato numérico es incorrecto',
            'deposito.required' => 'Este campo es obligatorio',
            'deposito.numeric' => 'El formato numérico es incorrecto',
        ]);

        $habitacion = Habitacion::create([
            'residencia_id' => $id,
            'alias' => $request->alias,
            'medidas' => $request->medidas,
            'renta' => $request->renta,
            'deposito' => $request->deposito,
            'descripcion' => $request->descripcion,
        ]);

        if ($habitacion) {
            return redirect()->route('detalle_residencias', $id)->with('message', 'La habitación ' . $habitacion->alias . ' se creó con éxito.');
        }
    }

    public function edit($id)
    {
        $habitacion = Habitacion::find($id);
        $residentes = [];
        foreach (User::get() as $user) {
            if ($user->hasRole('Residente'))
                $residentes[] = $user;
        }
        return view('habitaciones.edit', compact('habitacion', 'residentes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alias' => 'required',
            'medidas' => 'required',
            'renta' => 'required|numeric',
            'deposito' => 'required|numeric',
        ], [
            'alias.required' => 'Este campo es obligatorio',
            'medidas.required' => 'Este campo es obligatorio',
            'renta.required' => 'Este campo es obligatorio',
            'renta.numeric' => 'El formato numérico es incorrecto',
            'deposito.required' => 'Este campo es obligatorio',
            'deposito.numeric' => 'El formato numérico es incorrecto',
        ]);

        $habitacion = Habitacion::find($id);

        if ($habitacion->update($request->all())) {
            return redirect()->route('detalle_residencias', $habitacion->residencia->id)->with('message', 'La habitación ' . $habitacion->alias . ' se actualizó con éxito.');
        }
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);
        $id = $habitacion->residencia->id;
        $alias = $habitacion->alias;
        if ($habitacion->delete()) {
            return redirect()->route('detalle_residencias', $id)->with('message', 'La habitación ' . $alias . ' se eliminó con éxito.');
        }
    }
}
