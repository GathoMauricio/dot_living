@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Crear usuario
        </h3>
        <form action="{{ route('store_usuarios') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="container">
                <h5 class="text-primary text-center">Roles y permisos</h5>
                <hr class="text-primary" style="border: solid 3px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="roles">Rol(es)</label>
                            <select name="roles[]" class="select2 form-control" multiple>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->name }}" @if (is_array(old('roles')) && in_array($rol->name, old('roles'))) selected @endif>
                                        {{ $rol->name }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
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
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre"
                                class="form-control">
                            @error('name')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="apaterno">A. Paterno</label>
                            <input type="text" name="apaterno" value="{{ old('apaterno') }}" placeholder="A. Paterno"
                                class="form-control">
                            @error('apaterno')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="amaterno">A. Materno</label>
                            <input type="text" name="amaterno" value="{{ old('amaterno') }}" placeholder="A. Materno"
                                class="form-control">
                            @error('amaterno')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control"
                                accept="image/jpg, image/jpeg, image/png">
                            @error('foto')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                class="form-control">
                            @error('email')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono"
                                class="form-control">
                            @error('telefono')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ocupacion">Ocupación</label>
                            <input type="text" name="ocupacion" value="{{ old('ocupacion') }}" placeholder="Ocupación"
                                class="form-control">
                            @error('ocupacion')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
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
                            <input type="text" name="nombre_emergencia" value="{{ old('nombre_emergencia') }}"
                                placeholder="Nombre del contacto" class="form-control">
                            @error('nombre_emergencia')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellido_emergencia">Apellido(s)</label>
                            <input type="text" name="apellido_emergencia" value="{{ old('apellido_emergencia') }}"
                                placeholder="Apellido del contacto" class="form-control">
                            @error('apellido_emergencia')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono_emergencia">Teléfono</label>
                            <input type="text" name="telefono_emergencia" value="{{ old('telefono_emergencia') }}"
                                placeholder="Teléfono del contacto" class="form-control">
                            @error('telefono_emergencia')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="identificacion_emergencia">Identificacion del contacto
                                <span class="text-primary">(png, jpg,
                                    jpeg)</span>
                            </label>
                            <input type="file" name="identificacion_emergencia" class="form-control"
                                accept="image/jpg, image/jpeg, image/png">
                            @error('identificacion_emergencia')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <h5 class="text-primary text-center">Seguridad</h5>
                <hr class="text-primary" style="border: solid 3px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" placeholder="Contraseña" class="form-control">
                            @error('password')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Repetir contraseña</label>
                            <input type="password" name="password_confirmation" placeholder="Repetir contraseña"
                                class="form-control">
                            @error('password_confirmation')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
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
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group p-2">
                            <input type="submit" class="btn btn-primary" value="Guardar cambios" style="float:right;">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
@section('custom_scripts')
@endsection
