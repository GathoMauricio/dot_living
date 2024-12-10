<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsuarioTipoDocumento;
use App\Models\DocumentoUsuario;
use App\Models\TipoFotoUsuarioHabitacion;
use App\Models\FotoUsuarioHabitacion;
use App\Models\Contrato;
use Spatie\Permission\Models\Role;
use NumberToWords\NumberToWords;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name'); //->paginate(15);

        return view('usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = User::find($id);
        $documentos_tipos = UsuarioTipoDocumento::orderBy('tipo')->get();
        $foto_tipos = TipoFotoUsuarioHabitacion::get();
        return view('usuarios.show', compact('usuario', 'documentos_tipos', 'foto_tipos'));
    }

    public function create()
    {
        $roles = Role::all();
        $documentos_tipos = UsuarioTipoDocumento::orderBy('tipo')->get();
        return view('usuarios.create', compact('roles', 'documentos_tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roles' => 'required',
            'name' => 'required',
            'apaterno' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ], [
            'roles.required' => 'Este campo es obligatorio',
            'name.required' => 'Este campo es obligatorio',
            'apaterno.required' => 'Este campo es obligatorio',
            'telefono.required' => 'Este campo es obligatorio',
            'email.required' => 'Este campo es obligatorio',
            'email.email' => 'El formato de email es incorrecto',
            'email.unique' => 'Este email ya se encuentra registrado',
            'password.required' => 'Este campo es obligatorio',
            'password.confirmed' => 'La confirmación de contraseña no coincide',
            'password_confirmation.required' => 'Este campo es obligatorio',
        ]);

        $usuario = User::create([
            'name' => $request->name,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'telefono' => $request->telefono,
            'ocupacion' => $request->ocupacion,
            'nombre_emergencia' => $request->nombre_emergencia,
            'apellido_emergencia' => $request->apellido_emergencia,
            'telefono_emergencia' => $request->telefono_emergencia,
            'domicilio_emergencia' => $request->domicilio_emergencia,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => "perfil.jpg",
            'num_ine' => $request->num_ine,
        ]);

        if ($request->file('foto')) {
            $ruta_completa = $request->file('foto')->store('public/foto_usuario');
            $partes = explode('/', $ruta_completa);
            $nombre_imagen = $partes[2];
            $usuario->foto = $nombre_imagen;
            $usuario->save();
        }

        if ($request->file('identificacion_emergencia')) {
            $ruta_completa = $request->file('identificacion_emergencia')->store('public/identificacion_emergencia');
            $partes = explode('/', $ruta_completa);
            $nombre_imagen = $partes[2];
            $usuario->identificacion_emergencia = $nombre_imagen;
            $usuario->save();
        }

        if ($request->tipos_documentos) {
            for ($i = 0; $i < count($request->tipos_documentos); $i++) {
                $documento = DocumentoUsuario::create([
                    'tipo_id' => $request->tipos_documentos[$i],
                    'usuario_id' => $usuario->id,
                    'extension' => 'temp',
                    'archivo' => 'temp',
                ]);
                $ruta_completa = $request->file('documentos')[$i]->store('public/documento_usuario');
                $partes = explode('/', $ruta_completa);
                $nombre_archivo = $partes[2];
                $documento->archivo = $nombre_archivo;
                $extension = explode('.', $nombre_archivo);
                $documento->extension = $extension[1];
                $documento->save();
            }
        }

        $usuario->syncRoles($request->roles);

        if ($usuario) {
            return redirect()->route('usuarios')->with('message', 'El usuario ' . $usuario->email . ' se creó con éxito.');
        }
    }

    public function storeDocumento(Request $request)
    {
        $documento = DocumentoUsuario::create([
            'tipo_id' => $request->tipo_id,
            'usuario_id' => $request->usuario_id,
            'extension' => 'temp',
            'archivo' => 'temp',
        ]);

        $ruta_completa = $request->file('documento')->store('public/documento_usuario');
        $partes = explode('/', $ruta_completa);
        $nombre_archivo = $partes[2];
        $documento->archivo = $nombre_archivo;
        $extension = explode('.', $nombre_archivo);
        $documento->extension = $extension[1];

        if ($documento->save()) {
            return redirect()->back()->with('message', 'El registro se creó con éxito.');
        }
    }

    public function storeFotoHabitacion(Request $request)
    {
        $foto = FotoUsuarioHabitacion::create([
            'tipo_id' => $request->tipo_id,
            'usuario_id' => $request->usuario_id,
            'foto' => 'temp',
            'descripcion' => $request->descripcion,
        ]);

        $ruta_completa = $request->file('foto')->store('public/usuario_habitacion_fotos');
        $partes = explode('/', $ruta_completa);
        $nombre_foto = $partes[2];
        $foto->foto = $nombre_foto;

        if ($foto->save()) {
            return redirect()->back()->with('message', 'El registro se creó con éxito.');
        }
    }

    public function edit($id)
    {
        $roles = Role::all();
        $usuario = User::find($id);
        return view('usuarios.edit', compact('roles', 'usuario'));
    }

    public function update(Request $request, $id)
    {
        $validations = [
            'roles' => 'required',
            'name' => 'required',
            'apaterno' => 'required',
            'telefono' => 'required',
        ];
        if ($request->password) {
            $validations = $validations + [
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required',
            ];
        }

        $request->validate($validations, [
            'roles.required' => 'Este campo es obligatorio',
            'name.required' => 'Este campo es obligatorio',
            'apaterno.required' => 'Este campo es obligatorio',
            'telefono.required' => 'Este campo es obligatorio',
            'password.required' => 'Este campo es obligatorio',
            'password.confirmed' => 'La confirmación de contraseña no coincide',
            'password_confirmation.required' => 'Este campo es obligatorio',
        ]);

        $usuario = User::find($id);

        $usuario->name = $request->name;
        $usuario->apaterno = $request->apaterno;
        $usuario->amaterno = $request->amaterno;
        $usuario->telefono = $request->telefono;
        $usuario->ocupacion = $request->ocupacion;
        $usuario->num_ine = $request->num_ine;
        $usuario->nombre_emergencia = $request->nombre_emergencia;
        $usuario->apellido_emergencia = $request->apellido_emergencia;
        $usuario->telefono_emergencia = $request->telefono_emergencia;
        $usuario->domicilio_emergencia = $request->domicilio_emergencia;

        if ($request->file('foto')) {
            $ruta_completa = $request->file('foto')->store('public/foto_usuario');
            $partes = explode('/', $ruta_completa);
            $nombre_imagen = $partes[2];
            $usuario->foto = $nombre_imagen;
        }

        if ($request->file('identificacion_emergencia')) {
            $ruta_completa = $request->file('identificacion_emergencia')->store('public/identificacion_emergencia');
            $partes = explode('/', $ruta_completa);
            $nombre_imagen = $partes[2];
            $usuario->identificacion_emergencia = $nombre_imagen;
        }

        if ($request->password) {
            $usuario->password = bcrypt($request->password);
        }

        $usuario->syncRoles($request->roles);

        if ($usuario->save()) {
            return redirect()->route('usuarios')->with('message', 'El usuario ' . $usuario->email . ' se actualizó con éxito.');
        }
    }

    public function ajaxDatosContrato($id)
    {
        $usuario = User::find($id);
        $habitacion = $usuario->habitacion;
        if ($habitacion) {
            return json_encode([
                'estatus' => 1,
                'habitacion_id' => $habitacion->id,
                'deposito_num' => $habitacion->deposito,
                'deposito_text' => ucfirst(NumberToWords::transformNumber('es', $habitacion->deposito)),
                'renta_num' => $habitacion->renta,
                'renta_text' => ucfirst(NumberToWords::transformNumber('es', $habitacion->renta)),
            ]);
        } else {
            return json_encode([
                'estatus' => 0,
            ]);
        }

        return $habitacion;
    }

    public function storeContrato(Request $request)
    {
        $contrato = Contrato::create(
            [
                'estatus' => 'Pendiente',
                'residente_id' => $request->residente_id,
                'habitacion_id' => $request->habitacion_id,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'deposito_num' => str_replace('$', '', $request->deposito_num),
                'deposito_text' => $request->deposito_text,
                'renta_num' => str_replace('$', '', $request->renta_num),
                'renta_text' => $request->renta_text,
                'firma' => null,
            ]
        );
        if ($contrato) {
            return redirect()->back()->with('message', 'El contrato se creo con éxito.');
        }
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $email = $usuario->email;
        if ($usuario->delete()) {
            return redirect()->route('usuarios')->with('message', 'El usuario ' . $email . ' se eliminó con éxito.');
        }
    }

    public function apiLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && \Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                "estatus" => 1,
                "mensaje" => "Inicio de sesión correcto.",
                "auth_token" => $token,
                "usuario" => $user,
            ]);
        } else {
            return response()->json([
                "estatus" => 0,
                "mensaje" => "Información incorrecta.",
            ]);
        }
    }

    public function apiDatosUsuario(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        if ($user) {
            $residencia = null;
            $habitacion = null;
            if ($user->habitacion) {
                $residencia = $user->habitacion->residencia;
                $habitacion = $user->habitacion;
            }
            return response()->json(
                [
                    'estatus' => 1,
                    'usuario' => $user,
                    'residencia' => $residencia,
                    'habitacion' => $habitacion
                ]
            );
        } else {
            return response()->json(
                [
                    'estatus' => 0,
                    'mensjase' => "No se encontro al usuario",
                ]
            );
        }
    }

    public function apiLogout()
    {
        // eliminar todas las sesiones
        //auth()->user()->tokens()->delete();
        //eliminar sesión actual
        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "La sesión se cerró exitosamente.",
        ]);
    }
}
