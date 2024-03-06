@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            @can('crear_residencias')
                <div style="float: right;">
                    <a href="{{ route('crear_residencias') }}" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
            @endcan
            Residencias
        </h3>
        <div style="width:300px;float:right;">
            <br>
            <select onchange="detalle(this.value)" class="form-select select2">
                <option value>Buscar</option>
                @foreach ($residencias->get() as $residencia)
                    <option value="{{ $residencia->id }}">{{ $residencia->nombre }}</option>
                @endforeach
            </select>
            <br><br>
        </div>
        {{ $residencias->paginate(15)->links('pagination::bootstrap-4') }}
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Auditor</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($residencias->paginate(15) as $residencia)
                    <tr>
                        <td>{{ $residencia->nombre }}</td>
                        <td>{{ $residencia->direccion }}</td>
                        <td>
                            {{ $residencia->auditor->name }} {{ $residencia->auditor->apaterno }}
                            {{ $residencia->auditor->amaterno }}
                        </td>
                        <td>{{ $residencia->telefono }}</td>
                        <td>{{ $residencia->email }}</td>
                        <td>
                            @can('detalle_residencias')
                                <a href="{{ route('detalle_residencias', $residencia->id) }}" class="btn btn-info"
                                    title="Ver"><i class="icon-eye"></i></a>
                            @endcan
                            @can('editar_residencias')
                                <a href="{{ route('editar_residencias', $residencia->id) }}" class="btn btn-warning"
                                    title="Editar"><i class="icon-pencil"></i></a>
                            @endcan
                            @can('eliminar_residencias')
                                <a href="javascript:void(0)" onclick="eliminar({{ $residencia->id }});" class="btn btn-danger"
                                    title="Eliminar"><i class="icon-bin"></i></a>
                                <form action="{{ route('eliminar_residencias', $residencia->id) }}"
                                    id="form_eliminar_{{ $residencia->id }}" method="POST"> @csrf @method('DELETE') </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('custom_scripts')
    <script>
        function detalle(id) {
            if (id.length > 0)
                window.location = "{{ route('detalle_residencias') }}/" + id;
        }

        function eliminar(id) {
            alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                $("#form_eliminar_" + id).submit();
            }, function() {});
        }
    </script>
@endsection
