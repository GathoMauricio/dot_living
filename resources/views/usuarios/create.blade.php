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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="num_ine">Número de INE</label>
                            <input type="text" name="num_ine" value="{{ old('num_ine') }}" placeholder="Número de INE"
                                class="form-control">
                            @error('num_ine')
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
                <div class="row">
                    <div class="col-md-12">
                        <label for="domicilio_emergencia">Domicilio del contacto</label>
                        <textarea name="domicilio_emergencia" class="form-control" placeholder="Domicilio del contacto">{{ old('domicilio_emergencia') }}</textarea>
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
                <div id="contenedor_documentos"></div>
                <br>
                <div class="row">
                    <center>
                        <button type="button" onclick="agregarDocumento()" class="btn btn-primary">Añadir
                            documento</button>
                    </center>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group p-2">
                            <input type="submit" class="btn btn-success" value="Guardar cambios" style="float:right;">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
@section('custom_scripts')
    <script>
        var documento_id = 0;

        function agregarDocumento() {
            documento_id++;
            $('#contenedor_documentos').append(`
            <div class="row" id="row_documento_${documento_id}">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="tipos_documentos">Tipo de documento</label>
                        <select name="tipos_documentos[]" class="form-control" required>
                            <option value>--Seleccione--</option>
                            @foreach ($documentos_tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="documentos">Seleccione el archivo</label>
                        <span class="text-primary">(png, jpg,
                                    jpeg, pdf)</span>
                        <input type="file" name="documentos[]" class="form-control"
                            accept="image/jpg, image/jpeg, image/png, application/pdf" required>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <br>
                        <a href="javascript:void(0)" onclick="removerDocumento(${documento_id})">Remover</a>
                    </div>
                </div>
            </div>
            <br>
        `);
        }

        function removerDocumento(id) {
            $("#row_documento_" + id).remove();
        }
    </script>
@endsection
