@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            <div style="float: right;">
                <a href="javascript:void(0);" onclick="nuevaConversacion();" class="btn btn-primary" title="Nuevo"><i
                        class="icon icon-plus"></i></a>
            </div>
            Conversaciones
        </h3>
        {{ $conversaciones->links('pagination::bootstrap-4') }}
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Asunto</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($conversaciones as $conversacion)
                    <tr>
                        <td>{{ $conversacion->created_at }}</td>
                        <td>{{ $conversacion->residente->name }} {{ $conversacion->residente->apaterno }}
                            {{ $conversacion->residente->amaterno }}</td>
                        <td>{{ $conversacion->asunto }}</td>
                        <td>
                            <a href="{{ route('conversacion', $conversacion->id) }}" class="btn btn-info" title="Ver"><i
                                    class="icon-eye"></i></a>
                            {{--  @can('detalle_usuarios')
                                <a href="{{ route('detalle_usuarios', $usuario->id) }}" class="btn btn-info" title="Ver"><i
                                        class="icon-eye"></i></a>
                            @endcan
                            @can('editar_usuarios')
                                <a href="{{ route('editar_usuarios', $usuario->id) }}" class="btn btn-warning"
                                    title="Editar"><i class="icon-pencil"></i></a>
                            @endcan
                            @can('eliminar_usuarios')
                                <a href="javascript:void(0)" onclick="eliminar({{ $usuario->id }});" class="btn btn-danger"
                                    title="Eliminar"><i class="icon-bin"></i></a>
                                <form action="{{ route('eliminar_usuarios', $usuario->id) }}"
                                    id="form_eliminar_{{ $usuario->id }}" method="POST"> @csrf @method('DELETE') </form>
                            @endcan  --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('conversaciones.create')
@endsection
@section('custom_scripts')
    <script>
        function nuevaConversacion() {
            $("#create_conversacion").modal('show');
        }
    </script>
@endsection
