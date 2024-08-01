<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenidad;
use App\Models\TipoAmenidad;
use App\Models\EstatusAmenidad;
use Illuminate\Support\Facades\Auth;

class AmenidadController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Residente')) {
            $amenidades = Amenidad::where('residente_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
        }

        if (Auth::user()->hasRole('Auditor')) {

            $amenidades = Amenidad::leftJoin('users', 'users.id', 'amenidades.residente_id')
                ->leftJoin('residencias', 'users.id', 'residencias.id')
                ->orderBy('residencias.id', 'DESC')
                ->paginate(15);
        }

        if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Super usuario')) {
            $amenidades = Amenidad::orderBy('id', 'DESC')->paginate(15);
        }

        return view('amenidades.index', compact('amenidades'));
    }

    public function create()
    {
        $tipo_amenidades = TipoAmenidad::orderBy('nombre')->get();
        return view('amenidades.create', compact('tipo_amenidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_id' => 'required',
            'fecha' => 'required',
            'descripcion' => 'required',
        ]);

        $amenidad = Amenidad::create([
            'estatus_id' => 1,
            'residente_id' => Auth::user()->id,
            'tipo_id' => $request->tipo_id,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
        ]);
        if ($amenidad) {
            return redirect()->route('amenidades')->with('message', 'El registro se creó con éxito.');
        }
    }

    public function show($id)
    {
        $amenidad = Amenidad::findOrFail($id);
        $estatuses = EstatusAmenidad::all();
        return view('amenidades.show', compact('amenidad', 'estatuses'));
    }

    public function cambiarEstatus(Request $request, $id)
    {
        $amenidad = Amenidad::findOrFail($id);
        $amenidad->estatus_id = $request->estatus_id;
        if ($amenidad->save()) {
            return redirect()->route('detalle_amenidad', $id)->with('message', 'El registro se actualizó con éxito.');
        }
    }
}
