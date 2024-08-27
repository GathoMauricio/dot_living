@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <a href="{{ route('editar_usuarios', $usuario->id) }}" style="float:right">Editar</a>
        <h3>
            Detalle usuario
        </h3>
        <center>
            @if ($usuario->foto == 'perfil.jpg')
                <img src="{{ asset('img/perfil.jpg') }}" alt="{{ asset('img/perfil.jpg') }}" style="width:120px;height:120px"
                    class="rounded-circle shadow-4-strong">
            @else
                <img src="{{ asset('storage/foto_usuario/' . $usuario->foto) }}"
                    alt="{{ asset('storage/foto_usuario/' . $usuario->foto) }}" style="width:120px;height:120px"
                    class="rounded-circle shadow-4-strong">
            @endif
        </center>
        <div class="container">
            <h5 class="text-primary text-center">Roles y permisos</h5>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="roles">Rol(es)</label>
                        <br>
                        @foreach ($usuario->roles as $rol)
                            <span>{{ $rol->name }}, </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <h5 class="text-primary text-center">Información personal</h5>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <br>
                        <span>{{ $usuario->name }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="apaterno">A. Paterno</label>
                        <br>
                        <span>{{ $usuario->apaterno }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="amaterno">A. Materno</label>
                        <br>
                        <span>{{ $usuario->amaterno }}</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <br>
                        <span>{{ $usuario->email }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <br>
                        <span>{{ $usuario->telefono }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ocupacion">Ocupación</label>
                        <br>
                        <span>{{ $usuario->ocupacion }}</span>
                    </div>
                </div>
            </div>
            <br>
            <h5 class="text-primary text-center">Contacto de emergencia</h5>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre_emergencia">Nombre(s)</label>
                        <br>
                        <span>{{ $usuario->nombre_emergencia }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellido_emergencia">Apellido(s)</label>
                        <br>
                        <span>{{ $usuario->apellido_emergencia }}</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono_emergencia">Teléfono</label>
                        <br>
                        <span>{{ $usuario->telefono_emergencia }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="identificacion_emergencia">Identificacion del contacto</label>
                        <br>
                        @if ($usuario->identificacion_emergencia)
                            <a href="{{ asset('storage/identificacion_emergencia/' . $usuario->identificacion_emergencia) }}"
                                target="_BLANK">
                                <img src="{{ asset('storage/identificacion_emergencia/' . $usuario->identificacion_emergencia) }}"
                                    alt="{{ $usuario->identificacion_emergencia }}" width="120">
                            </a>
                        @else
                            No disponible
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <h5 class="text-primary text-center">Documentación</h5>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut inventore optio quia aliquid aperiam, ad
                cupiditate error totam neque dolorem maxime impedit voluptas asperiores numquam eveniet itaque mollitia
                ut libero!
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
@endsection
