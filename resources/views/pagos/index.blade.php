@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            @can('crear_pagos')
                <div style="float: right;">
                    <a href="{{ route('crear_pagos') }}" class="btn btn-primary" title="Nuevo"><i class="icon icon-plus"></i></a>
                </div>
            @endcan
            Pagos
        </h3>
        {{ $pagos->links() }}
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                    <th>Cantidad</th>
                    <th>Residencia</th>
                    <th>Habitación</th>
                    <th>Residente</th>
                    <th>Comprobante</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->fecha }}</td>
                        <td>{{ $pago->tipo->nombre }}</td>
                        <td>{{ $pago->estatus->nombre }}</td>
                        <td>${{ $pago->cantidad }}</td>
                        <td>
                            @if ($pago->residente->habitacion->residencia->nombre)
                                {{ $pago->residente->habitacion->residencia->nombre }}
                            @else
                                No disponible
                            @endif
                        </td>
                        <td>
                            @if ($pago->residente->habitacion->alias)
                                {{ $pago->residente->habitacion->alias }}
                            @else
                                No disponible
                            @endif
                        </td>
                        <td>{{ $pago->residente->name }} {{ $pago->residente->apaterno }} {{ $pago->residente->amaterno }}
                        </td>
                        <td class="text-center">
                            @if ($pago->comprobante)
                                <a href="{{ asset('storage/comprobantes/' . $pago->comprobante) }}" target="_BLANK"
                                    class="btn btn-success">
                                    <span class="icon icon-download"></span>
                                </a>
                                <br>
                                <small><strong>Descargar</strong></small>
                            @else
                                @can('cargar_comprobante_pagos')
                                    <button class="btn btn-primary" onclick="cargarComprobantePagos({{ $pago->id }});">
                                        <span class="icon icon-upload"></span>
                                    </button>
                                    <br>
                                    <small><strong>Cargar</strong></small>
                                @endcan
                            @endif
                        </td>
                        <td>
                            @can('detalle_pagos')
                                <a href="{{ route('detalle_pagos', $pago->id) }}" class="btn btn-info" title="Ver"><i
                                        class="icon-eye"></i></a>
                            @endcan
                            @can('editar_pagos')
                                <a href="{{ route('editar_pagos', $pago->id) }}" class="btn btn-warning" title="Editar"><i
                                        class="icon-pencil"></i></a>
                            @endcan
                            @can('eliminar_pagos')
                                <a href="javascript:void(0)" onclick="eliminar({{ $pago->id }});" class="btn btn-danger"
                                    title="Eliminar"><i class="icon-bin"></i></a>
                                <form action="{{ route('eliminar_pagos', $pago->id) }}" id="form_eliminar_{{ $pago->id }}"
                                    method="POST"> @csrf @method('DELETE') </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach

                @if (count($pagos) <= 0)
                    <tr>
                        <td colspan="8" class="text-center">Sin resultados</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @include('pagos.cargar_comprobante_pagos')
@endsection
@section('custom_scripts')
    <script>
        function cargarComprobantePagos(id) {
            $("#txt_pago_id").val(id);
            $("#cargar_comprobante_pagos").modal('show');
        }

        function eliminar(id) {
            alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                $("#form_eliminar_" + id).submit();
            }, function() {});
        }
    </script>
@endsection
