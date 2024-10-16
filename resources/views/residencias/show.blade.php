@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Detalle residencia ❝{{ $residencia->nombre }}❞
        </h3>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Nombre:
                </div>
                <div class="col-md-6">
                    {{ $residencia->nombre }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Auditor:
                </div>
                <div class="col-md-6">
                    {{ $residencia->auditor->name }}
                    {{ $residencia->auditor->apaterno }}
                    {{ $residencia->auditor->amaterno }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Teléfono
                </div>
                <div class="col-md-6">
                    {{ $residencia->telefono }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Email:
                </div>
                <div class="col-md-6">
                    {{ $residencia->email }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Dirección
                </div>
                <div class="col-md-6">
                    {{ $residencia->direccion }}
                </div>
            </div>
            <br>
            <hr>
            <h3>
                @can('crear_medio_residencias')
                    <div style="float: right;">
                        <a href="javascript:void(0);" onclick="createMedio();" class="btn btn-primary" title="Nuevo"><i
                                class="icon icon-plus"></i></a>
                    </div>
                @endcan
                Multimedia
            </h3>
            <div class="container">
                <div class="row">
                    @foreach ($residencia->medios as $medio)
                        <div class="col-md-3 text-center">
                            <div class="card">
                                @can('eliminar_medio_residencias')
                                    <div class="card-header">

                                        <div style="float: left;">
                                            @if ($medio->id != $residencia->foto_default_id)
                                                <form action="{{ route('update_foto_default_residencias', $residencia->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="foto_default_id" value="{{ $medio->id }}">
                                                    <button type="submit" class="btn btn-primary"
                                                        title="Marcar como imagen por defecto"><i
                                                            class="icon icon-pushpin"></i></button>
                                                </form>
                                            @else
                                                <span style="font-weight: bold;" class="icon icon-pushpin"> Default</span>
                                            @endif
                                        </div>
                                        @if ($medio->id != $residencia->foto_default_id)
                                            <div style="float: right;">
                                                <a href="javascript:void(0);" onclick="deleteMedio({{ $medio->id }});"
                                                    class="btn btn-danger" title="Eliminar"><i class="icon icon-bin"></i></a>
                                                <form action="{{ route('delete_media_residencias', $medio->id) }}"
                                                    id="form_delete_medio_{{ $medio->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                        @endif
                                    </div>
                                @endcan
                                <div class="card-body">
                                    <img src="{{ asset('storage/residencias/' . $medio->ruta) }}"
                                        alt="{{ $medio->ruta }}" style="width:100%;height:200px;">
                                </div>
                                <div class="card-footer">
                                    {{ $medio->descripcion }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (count($residencia->medios) <= 0)
                        <center>No se encontraron medios</center>
                    @endif
                </div>
            </div>
            <hr>
            <h3>
                @can('crear_habitaciones')
                    <div style="float: right;">
                        <a href="{{ route('crear_habitaciones', $residencia->id) }}" class="btn btn-primary" title="Nuevo"><i
                                class="icon icon-plus"></i></a>
                    </div>
                @endcan
                Habitaciones
            </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Alias</th>
                        <th>Medidas</th>
                        <th>Renta</th>
                        <th>Depósito</th>
                        <th>Residente</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($residencia->habitaciones as $habitacion)
                        <tr>
                            <td>{{ $habitacion->alias }}</td>
                            <td>{{ $habitacion->medidas }}</td>
                            <td>${{ $habitacion->renta }}</td>
                            <td>${{ $habitacion->deposito }}</td>
                            <td>
                                @if (!empty($habitacion->residente))
                                    {{ $habitacion->residente->name }}
                                    {{ $habitacion->residente->apaterno }}
                                    {{ $habitacion->residente->amaterno }}
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                @can('detalle_habitaciones')
                                    <a href="{{ route('detalle_habitaciones', $habitacion->id) }}" class="btn btn-info"
                                        title="Detalles"><i class="icon-eye"></i></a>
                                @endcan
                                @can('editar_habitaciones')
                                    <a href="{{ route('editar_habitaciones', $habitacion->id) }}" class="btn btn-warning"
                                        title="Editar"><i class="icon-pencil"></i></a>
                                @endcan
                                @can('eliminar_habitaciones')
                                    <a href="javascript:void(0)" onclick="eliminar({{ $habitacion->id }});"
                                        class="btn btn-danger" title="Eliminar"><i class="icon-bin"></i></a>
                                    <form action="{{ route('eliminar_habitaciones', $habitacion->id) }}"
                                        id="form_eliminar_{{ $habitacion->id }}" method="POST"> @csrf @method('DELETE')
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    @if (count($residencia->habitaciones) <= 0)
                        <tr>
                            <td colspan="6" class="text-center">Sin registros</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <h3>
                <div style="float: right;">
                    <a href="javascript:void(0);" onclick="createTablero();" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
                Notificaciones
                {{ $tableros->links('pagination::bootstrap-4') }}
            </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Autor</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tableros as $tablero)
                        <tr>
                            <td>
                                <strong>
                                    {{ $tablero->autor->name }}
                                    {{ $tablero->autor->apaterno }}
                                    {{ $tablero->autor->amaterno }}
                                </strong>
                                <br>
                                @foreach ($tablero->autor->roles as $rol)
                                    <i>{{ $rol->name }}</i>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                {{ $tablero->texto }}
                                @if ($tablero->tipo == 'media')
                                    <br>
                                    <a href="{{ asset('storage/tableros/' . $tablero->imagen) }}" target="_BLANK">
                                        <img src="{{ asset('storage/tableros/' . $tablero->imagen) }}" alt=""
                                            width="200" height="200">
                                    </a>
                                @endif
                            </td>
                            <td>{{ $tablero->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="3">Sin registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @include('residencias.medios.create', compact('residencia'))
        @include('tablero.create')
    @endsection
    @section('custom_scripts')
        <script>
            function createMedio() {
                $("#create_media_resiidencias").modal('show');
            }

            function deleteMedio(id) {
                alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                    $("#form_delete_medio_" + id).submit();
                }, function() {});
            }

            function detalle(id) {
                if (id.length > 0)
                    window.location = "{{ route('detalle_residencias') }}/" + id;
            }

            function eliminar(id) {
                alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                    $("#form_eliminar_" + id).submit();
                }, function() {});
            }

            function createTablero() {
                $("#create_tablero_resiidencias").modal('show');
            }
        </script>
    @endsection
