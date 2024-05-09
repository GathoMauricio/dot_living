@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            <div style="float: right;">
                <a href="{{ route('create_reporte') }}" class="btn btn-primary" title="Nuevo"><i
                        class="icon icon-plus"></i></a>
            </div>
            Tipos de reporte
        </h3>
        {{ $tipos->links() }}
        <table class="table">
            <thead>
                <tr>
                    <th width="90%">Tipo</th>
                    <th width="10%">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->nombre }}</td>
                        <td>
                            <a href="{{ route('edit_reporte', $tipo->id) }}" class="btn btn-warning" title="Editar"><i
                                    class="icon-pencil"></i></a>
                            <a href="javascript:void(0)" onclick="eliminar({{ $tipo->id }});" class="btn btn-danger"
                                title="Eliminar"><i class="icon-bin"></i></a>
                            <form action="{{ route('delete_reporte', $tipo->id) }}" id="form_eliminar_{{ $tipo->id }}"
                                method="POST"> @csrf @method('DELETE') </form>
                        </td>
                    </tr>
                @endforeach

                @if (count($tipos) <= 0)
                    <tr>
                        <td colspan="2" class="text-center">Sin resultados</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
@section('custom_scripts')
    <script>
        function eliminar(id) {
            alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                $("#form_eliminar_" + id).submit();
            }, function() {});
        }
    </script>
@endsection
