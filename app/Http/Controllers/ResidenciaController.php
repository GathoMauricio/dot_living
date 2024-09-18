<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residencia;
use App\Models\Habitacion;
use App\Models\Tablero;
use App\Models\User;

class ResidenciaController extends Controller
{
    public function index()
    {
        $residencias = Residencia::orderBy('nombre');
        return view('residencias.index', compact('residencias'));
    }

    public function show($id)
    {
        $residencia = Residencia::find($id);
        $tableros = Tablero::where('residencia_id', $residencia->id)->orderBy('id', 'DESC')->paginate(10);
        return view('residencias.show', compact('residencia', 'tableros'));
    }

    public function create()
    {
        $auditores =  [];
        foreach (User::get() as $user) {
            if ($user->hasRole('Auditor')) {
                $auditores[] = $user;
            }
        }
        return view('residencias.create', compact('auditores'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'auditor_id' => 'required',
                'nombre' => 'required',
                'email' => 'email',
            ],
            [
                'auditor_id.required' => 'Este campo es obligatorio',
                'nombre.required' => 'Este campo es obligatorio',
                'email.email' => 'El formato de email es incorrecto',
                'telefono.numeric' => 'El formato de teléfono es incorrecto',
            ]
        );

        $residencia = Residencia::create([
            'auditor_id' => $request->auditor_id,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
        ]);

        if ($residencia) {
            return redirect()->route('residencias')->with('message', 'La residencia ' . $residencia->nombre . ' se creó con éxito.');
        }
    }

    public function edit($id)
    {
        $residencia = Residencia::find($id);
        $auditores =  [];
        foreach (User::get() as $user) {
            if ($user->hasRole('Auditor')) {
                $auditores[] = $user;
            }
        }
        return view('residencias.edit', compact('residencia', 'auditores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'auditor_id' => 'required',
                'nombre' => 'required',
                'email' => 'email',
            ],
            [
                'auditor_id.required' => 'Este campo es obligatorio',
                'nombre.required' => 'Este campo es obligatorio',
                'email.email' => 'El formato de email es incorrecto',
                'telefono.numeric' => 'El formato de teléfono es incorrecto',
            ]
        );

        $residencia = Residencia::find($id);

        if ($residencia->update($request->all())) {
            return redirect()->route('residencias')->with('message', 'La residencia ' . $residencia->nombre . ' se actualizó con éxito.');
        }
    }

    public function destroy($id)
    {
        $residencia = Residencia::find($id);
        $nombre = $residencia->nombre;
        if ($residencia->delete()) {
            Habitacion::where('residencia_id', $id)->delete();
            return redirect()->route('residencias')->with('message', 'La residencia ' . $nombre . ' se eliminó con éxito.');
        }
    }

    public function apiIndexResidencia(Request $request)
    {
        $residencia = Residencia::find($request->residencia_id);//->with('auditor');
        return response()->json([
            'estatus' => 1,
            'data' => [
                'residencia' => $residencia,
                'auditor' => $residencia->auditor,
            ]
        ]);
    }
}
