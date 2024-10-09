@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="font-weight: bold;">
                        Asunto: {{ $conversacion->asunto }}
                    </div>
                    <form method="POST" action="{{ route('store_mensaje') }}">
                        @csrf
                        <input type="hidden" name="conversacion_id" value="{{ $conversacion->id }}">
                        <div class="card-body contenedor-mensajes" style="height:50vh">
                            @forelse($conversacion->mensajes as $mensaje)
                                <div class="p-3" style="background-color:#eaeded;border-radius:20px;">
                                    {{ $mensaje->usuario->name }} {{ $mensaje->usuario->apaterno }}
                                    {{ $mensaje->usuario->amaterno }}
                                    <hr>
                                    <p>
                                        {{ $mensaje->texto }}
                                    </p>
                                    <hr>
                                    <small style="float:right;">
                                        {{ $mensaje->created_at }} Hrs.
                                    </small>
                                    <br>
                                </div>
                                <br>
                            @empty
                                <center class="p-3">Aun no hay mensajes</center>
                            @endforelse
                        </div>
                        <div class="card-footer">
                            <table>
                                <tr>
                                    <td width="90%">
                                        <input type="text" name="texto" placeholder="Escriba aquí..."
                                            class="form-control" required />
                                    </td>
                                    <td width="10%">
                                        <input type="submit" class="btn btn-primary" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .contenedor-mensajes {
            overflow: hidden;
            overflow-y: scroll;
        }
    </style>
@endsection
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $('.contenedor-mensajes').scrollTop($('.contenedor-mensajes')[0].scrollHeight);
        });
    </script>
@endsection
