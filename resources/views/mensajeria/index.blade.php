@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            <div style="float: right;">
                <a href="javascript:void(0);" onclick="nuevoMensaje();" class="btn btn-primary" title="Nuevo"><i
                        class="icon icon-plus"></i></a>
            </div>
            Mensajeria
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
                @forelse ($mensajes as $mensaje)
                    <tr>
                        <td>
                            <strong>
                                {{ $mensaje->autor->name }}
                                {{ $mensaje->autor->apaterno }}
                                {{ $mensaje->autor->amaterno }}
                            </strong>
                        </td>
                        <td>
                            {{ $mensaje->texto }}
                            @if ($mensaje->tipo == 'media')
                                <br>
                                <a href="{{ asset('storage/mensajerias/' . $mensaje->imagen) }}" target="_BLANK">
                                    <img src="{{ asset('storage/mensajerias/' . $mensaje->imagen) }}" alt=""
                                        width="200" height="200">
                                </a>
                            @endif
                        </td>
                        <td>{{ $mensaje->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="3">Sin registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @include('mensajeria.create')
@endsection
@section('custom_scripts')
    <script>
        function nuevoMensaje() {
            $("#create_mensajeria").modal('show');
        }
    </script>
@endsection
