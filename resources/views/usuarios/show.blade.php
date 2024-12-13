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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num_ine">Número de INE</label>
                        <br>
                        <span>{{ $usuario->num_ine }}</span>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="domicilio_ine">Domicilio del contacto</label>
                        <br>
                        <span>{{ $usuario->domicilio_emergencia }}</span>
                    </div>
                </div>
            </div>
            <br>
            <h5 class="text-primary text-center">Documentación</h5>
            <a href="javascript:void(0)" onclick="createDocumento()" style="float:right;padding-left:5px;">Agregar
                documento</a>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                @forelse ($usuario->documentos as $documento)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                {{ $documento->tipo->tipo }}
                            </div>
                            <div class="card-body">
                                @if ($documento->extension == 'pdf')
                                    <embed src=" {{ asset('storage/documento_usuario/' . $documento->archivo) }}"
                                        width="100%" height="160" type="application/pdf">
                                @else
                                    <img src="{{ asset('storage/documento_usuario/' . $documento->archivo) }}"
                                        alt="{{ asset('storage/documento_usuario/' . $documento->archivo) }}"
                                        width="100%" height="160">
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ asset('storage/documento_usuario/' . $documento->archivo) }}" target="_BLANK"
                                    class="btn btn-primary">
                                    Abrir
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <center>No hay registros para mostrar</center>
                @endforelse
            </div>
            <br>
            <h5 class="text-primary text-center">Residencia y Habitacion</h5>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                @if ($usuario->habitacion)
                    <h5 class ="text-center"><a
                            href="{{ route('detalle_residencias', $usuario->habitacion->residencia->id) }}">{{ $usuario->habitacion->residencia->nombre }}</a>
                        | <a
                            href="{{ route('detalle_habitaciones', $usuario->habitacion->id) }}">{{ $usuario->habitacion->alias }}</a>
                    </h5>
                @else
                    <h5 class ="text-center">No disponible</h5>
                @endif
            </div>
            <br>
            <h5 class="text-primary text-center">Fotos de la habitación</h5>
            <a href="javascript:void(0)" onclick="createFotoHabitacion()" style="float:right;padding-left:5px;">Agregar
                foto</a>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                @forelse ($usuario->fotos_habitacion as $foto)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                {{ $foto->tipo->tipo }}
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('storage/usuario_habitacion_fotos/' . $foto->foto) }}"
                                    alt="{{ asset('storage/usuario_habitacion_fotos/' . $foto->foto) }}" width="100%"
                                    height="160">
                            </div>
                            <div class="card-footer text-center">
                                {{ $foto->descripcion }}
                                <br>
                                <a href="{{ asset('storage/usuario_habitacion_fotos/' . $foto->foto) }}" target="_BLANK"
                                    class="btn btn-primary">
                                    Abrir
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <center>No hay registros para mostrar</center>
                @endforelse
            </div>
            <br>
            <h5 class="text-primary text-center">Contratos</h5>
            <a href="javascript:void(0)" onclick="createContrato()" style="float:right;padding-left:5px;">Agregar
                contrato</a>
            <hr class="text-primary" style="border: solid 3px">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Estatus</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Fin</th>
                                <th>Deposito</th>
                                <th>Renta</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuario->contratos as $contrato)
                                <tr>
                                    <td>{{ $contrato->estatus }}</td>
                                    <td>{{ $contrato->fecha_inicio }}</td>
                                    <td>{{ $contrato->fecha_fin }}</td>
                                    <td>${{ $contrato->deposito_num }}</td>
                                    <td>${{ $contrato->renta_num }}</td>
                                    <td>
                                        <a href="{{ route('pdf_contrato', $contrato->id) }}" target="_blank"
                                            class="btn btn-primary" title="Ver contrato"><i
                                                class="icon-file-pdf"></i></a>

                                        <a href="javascript:void(0)" onclick="eliminarContrato({{ $contrato->id }});"
                                            class="btn btn-danger" title="Eliminar"><i class="icon-bin"></i></a>
                                        <form action="{{ route('eliminar_contrato', $contrato->id) }}"
                                            id="form_eliminar_contrato_{{ $contrato->id }}" method="POST"> @csrf
                                            @method('DELETE') </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No hay registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('usuarios.modal.create_documento')
    @include('usuarios.modal.create_foto_habitacion')
    @include('contratos.create');
@endsection
@section('custom_scripts')
    <script>
        function createDocumento() {
            $("#create_documento").modal('show');
        }

        function createContrato() {
            $.ajax({
                type: "GET",
                url: "{{ route('ajax_datos_contrato', $usuario->id) }}",
                data: {},
                success: function(response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    if (json.estatus == 1) {
                        $("#txt_contrato_habitacion_id").val(json.habitacion_id);
                        $("#txt_contrato_deposito_num").val("$" + json.deposito_num);
                        $("#txt_contrato_deposito_text").val(json.deposito_text + " PESOS 00/100 MXN ");
                        $("#txt_contrato_renta_num").val("$" + json.renta_num);
                        $("#txt_contrato_renta_text").val(json.renta_text + " PESOS 00/100 MXN ");
                    } else {
                        $("#btn_guardar_contrato").prop('disabled', true);
                        $("#lbl_mensaje").text("Este usuario no está asignado a ninguna habitación");
                    }
                },
                error: err => console.log(err)
            });
            $("#create_contrato_modal").modal('show');
        }

        function eliminarContrato(id) {
            alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                $("#form_eliminar_contrato_" + id).submit();
            }, function() {});
        }

        function createFotoHabitacion() {
            $("#create_foto_habitacion").modal('show');
        }
    </script>
@endsection
