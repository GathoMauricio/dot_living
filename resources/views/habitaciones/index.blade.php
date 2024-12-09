@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Habitaciones
        </h3>
        <div style="width:300px;float:right;">
            <br>
            <select onchange="detalle(this.value)" class="form-select select2">
                <option value>Buscar</option>
                @foreach ($habitaciones->get() as $habitacion)
                    <option value="{{ $habitacion->id }}">{{ $habitacion->alias }}</option>
                @endforeach
            </select>
            <br><br>
        </div>
        {{ $habitaciones->paginate(15)->links('pagination::bootstrap-4') }}
        <table class="table">
            <thead>
                <tr>
                    <th>Residencia</th>
                    <th>Alias</th>
                    <th>Número</th>
                    <th>Medidas</th>
                    <th>Renta</th>
                    <th>Deposito</th>
                    {{--  <th>Descriptción</th>  --}}
                    <th>Residente</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($habitaciones->paginate(15) as $habitacion)
                    <tr>
                        <th>
                            <a href="{{ route('detalle_residencias', $habitacion->residencia->id) }}">
                                {{ $habitacion->residencia->nombre }}
                            </a>
                        </th>
                        <td>{{ $habitacion->alias }}</td>
                        <td>{{ $habitacion->numero }}</td>
                        <td>{{ $habitacion->medidas }}</td>
                        <td>${{ $habitacion->renta }}</td>
                        <td>${{ $habitacion->deposito }}</td>
                        {{--  <td>{{ $habitacion->descripcion }}</td>  --}}
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
                                <a href="javascript:void(0)" onclick="eliminar({{ $habitacion->id }});" class="btn btn-danger"
                                    title="Eliminar"><i class="icon-bin"></i></a>
                                <form action="{{ route('eliminar_habitaciones', $habitacion->id) }}"
                                    id="form_eliminar_{{ $habitacion->id }}" method="POST"> @csrf @method('DELETE')
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                @if (count($habitaciones->get()) <= 0)
                    <tr>
                        <td colspan="6" class="text-center">Sin registros</td>
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
                window.location = "{{ route('detalle_habitaciones') }}/" + id;
        }

        function eliminar(id) {
            alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                $("#form_eliminar_" + id).submit();
            }, function() {});
        }
    </script>
@endsection
