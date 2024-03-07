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
            <h3>
                @can('crear_media_residencias')
                    <div style="float: right;">
                        <a href="#" class="btn btn-primary" title="Nuevo"><i class="icon icon-plus"></i></a>
                    </div>
                @endcan
                Multimedia
            </h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-center">
                        Foto
                    </div>
                    <div class="col-md-4 text-center">
                        Foto
                    </div>
                    <div class="col-md-4 text-center">
                        Foto
                    </div>
                    <div class="col-md-4 text-center">
                        Foto
                    </div>
                </div>
            </div>
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
                        <th>Deposito</th>
                        <th>Descriptción</th>
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
                            <td>{{ $habitacion->descripcion }}</td>
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
                            <td colspan="7" class="text-center">Sin registros</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    @endsection
    @section('custom_scripts')
        <script>
            function detalle(id) {
                if (id.length > 0)
                    window.location = "{{ route('detalle_usuarios') }}/" + id;
            }

            function eliminar(id) {
                alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                    $("#form_eliminar_" + id).submit();
                }, function() {});
            }
        </script>
    @endsection
