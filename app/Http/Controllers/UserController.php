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
                'estatus_cama' => $request->estatus_cama,
                'observaciones_cama' => $request->observaciones_cama ? $request->observaciones_cama : '',
                'estatus_colchon' => $request->estatus_colchon,
                'observaciones_colchon' => $request->observaciones_colchon ? $request->observaciones_colchon : '',
                'estatus_focos' => $request->estatus_focos,
                'observaciones_focos' => $request->observaciones_focos ? $request->observaciones_focos : '',
                'estatus_ventana_vidrios' => "fix" . $request->estatus_ventana_vidrios,
                'observaciones_ventana_vidrios' => $request->observaciones_ventana_vidrios ? $request->observaciones_ventana_vidrios : '',
                'estatus_pintura' => $request->estatus_pintura,
                'observaciones_pintura' => $request->observaciones_pintura ? $request->observaciones_pintura : '',
                'estatus_perforacion_pared' => $request->estatus_perforacion_pared,
                'observaciones_perforacion_pared' => $request->observaciones_perforacion_pared ? $request->observaciones_perforacion_pared : '',
                'estatus_puertas_rayones' => $request->estatus_puertas_rayones,
                'observaciones_puertas_rayones' => $request->observaciones_puertas_rayones ? $request->observaciones_puertas_rayones : '',
                'estatus_chapa' => $request->estatus_chapa,
                'observaciones_chapa' => $request->observaciones_chapa ? $request->observaciones_chapa : '',
                'estatus_juego_llaves' => $request->estatus_juego_llaves,
                'observaciones_juego_llaves' => $request->observaciones_juego_llaves ? $request->observaciones_juego_llaves : '',
                'estatus_regadera_fugas' => $request->estatus_regadera_fugas,
                'observaciones_regadera_fugas' => $request->observaciones_regadera_fugas ? $request->observaciones_regadera_fugas : '',
                'estatus_taza_bano_roturas' => $request->estatus_taza_bano_roturas,
                'observaciones_taza_bano_roturas' => $request->observaciones_taza_bano_roturas ? $request->observaciones_taza_bano_roturas : '',
                'estatus_lavabo_roturas' => $request->estatus_lavabo_roturas,
                'observaciones_lavabo_roturas' => $request->observaciones_lavabo_roturas ? $request->observaciones_lavabo_roturas : '',
                'estatus_chapa_ventana' => $request->estatus_chapa_ventana,
                'observaciones_chapa_ventana' => $request->observaciones_chapa_ventana ? $request->observaciones_chapa_ventana : '',
                'estatus_enchufes' => $request->estatus_enchufes,
                'observaciones_enchufes' => $request->observaciones_enchufes ? $request->observaciones_enchufes : '',
                'estatus_apagadores' => $request->estatus_apagadores,
                'observaciones_apagadores' => $request->observaciones_apagadores ? $request->observaciones_apagadores : '',
                'estatus_cortinas' => $request->estatus_cortinas,
                'observaciones_cortinas' => $request->observaciones_cortinas ? $request->observaciones_cortinas : '',
                'estatus_mueble_ropa' => $request->estatus_mueble_ropa,
                'observaciones_mueble_ropa' => $request->observaciones_mueble_ropa ? $request->observaciones_mueble_ropa : '',
                'notas' => $request->notas ? $request->notas : '',
                'estatus_access_point' => $request->estatus_access_point,
                'observaciones_access_point' => $request->observaciones_access_point ? $request->observaciones_access_point : '',
                'estatus_internet' => $request->estatus_internet,
                'observaciones_internet' => $request->observaciones_internet ? $request->observaciones_internet : '',
                'estatus_television' => $request->estatus_television,
                'observaciones_television' => $request->observaciones_television ? $request->observaciones_television : '',
                'estatus_sala' => $request->estatus_sala,
                'observaciones_sala' => $request->observaciones_sala ? $request->observaciones_sala : '',
                'estatus_menaje_cocina' => $request->estatus_menaje_cocina,
                'observaciones_menaje_cocina' => $request->observaciones_menaje_cocina ? $request->observaciones_menaje_cocina : '',
                'estatus_refrigerador' => $request->estatus_refrigerador,
                'observaciones_refrigerador' => $request->observaciones_refrigerador ? $request->observaciones_refrigerador : '',
                'estatus_horno_microondas' => $request->estatus_horno_microondas,
                'observaciones_horno_microondas' => $request->observaciones_horno_microondas ? $request->observaciones_horno_microondas : '',
                'estatus_estufa' => $request->estatus_estufa,
                'observaciones_estufa' => $request->observaciones_estufa ? $request->observaciones_estufa : '',
                'estatus_lavadora' => $request->estatus_lavadora,
                'observaciones_lavadora' => $request->observaciones_lavadora ? $request->observaciones_lavadora : '',
                'estatus_area_tendido' => $request->estatus_area_tendido,
                'observaciones_area_tendido' => $request->observaciones_area_tendido ? $request->observaciones_area_tendido : '',
                'estatus_video_vigilancia' => $request->estatus_video_vigilancia,
                'observaciones_video_vigilancia' => $request->observaciones_video_vigilancia ? $request->observaciones_video_vigilancia : '',
            ]
        );
        if ($contrato) {
            return redirect()->back()->with('message', 'El contrato se creó con éxito.');
        }
    }

    public function pdfContrato($id)
    {
        $contrato = Contrato::find($id);
        $pdf = \PDF::loadView(
            'pdf.contrato',
            ['contrato' => $contrato]
        );
        return $pdf->stream('Contrato.pdf');
    }

    public function destroyContrato($id)
    {
        $contrato = Contrato::find($id);
        if ($contrato->delete()) {
            return redirect()->back()->with('message', 'El contrato se eliminó con éxito.');
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
