@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Detalle amenidad
        </h3>
        <div class="row">
            <div class="col-md-6">
                Autor:
            </div>
            <div class="col-md-6">
                {{ $amenidad->residente->name }} {{ $amenidad->residente->apaterno }} {{ $amenidad->residente->amaterno }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                Tipo:
            </div>
            <div class="col-md-6">
                {{ $amenidad->tipo->nombre }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                Estatus:
            </div>
            <div class="col-md-6">
                @if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Auditor'))
                    <div class="form-group">
                        <form action="{{ route('canbiar_estatus_amenidad', $amenidad->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="estatus_id" class="select2" style="width:200px;">
                                @foreach ($estatuses as $estatus)
                                    @if ($amenidad->estatus_id == $estatus->id)
                                        <option value="{{ $estatus->id }}" selected>{{ $estatus->nombre }}</option>
                                    @else
                                        <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button class="btn btn-warning" style="width:40px;height: 30px;">
                                <span class="icon-pencil"></span>
                            </button>
                            {{--  <input type="submit" value="Cambian estatus">  --}}
                        </form>
                    </div>
                @else
                    {{ $amenidad->estatus->nombre }}
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                Descripción:
            </div>
            <div class="col-md-6">
                {{ $amenidad->descripcion }}
            </div>
        </div>
        <br>
    </div>
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
            <h3>
                <div style="float: right;">
                    <a href="javascript:void(0)" onclick="createSeguimiento();" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
                Seguimientos
            </h3>
            <br>
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Autor</th>
                            <th>Texto</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($amenidad->seguimientos as $seguimiento)
                            <tr>
                                <td>{{ $seguimiento->created_at }}</td>
                                <td>
                                    {{ $seguimiento->autor->name }}
                                    {{ $seguimiento->autor->apaterno }}
                                    {{ $seguimiento->autor->amaterno }}
                                </td>
                                <td>{{ $seguimiento->texto }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">Sin registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('amenidades.seguimiento_modal')
@endsection
@section('custom_scripts')
    <script>
        function createSeguimiento() {
            $("#create_seguimientos_modal").modal('show');
        }

        function createAdjunto() {
            $("#create_adjuntos_modal").modal('show');
        }
    </script>
@endsection
