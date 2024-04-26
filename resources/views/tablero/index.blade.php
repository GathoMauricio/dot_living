@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Tablero
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
    @include('tablero.create')
@endsection
@section('custom_scripts')
    function createTablero() {
    $("#create_tablero_resiidencias").modal('show');
    }
@endsection
