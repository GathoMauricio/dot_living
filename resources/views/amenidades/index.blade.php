@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            @can('crear_amenidad')
                <div style="float: right;">
                    <a href="{{ route('crear_amenidad') }}" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
            @endcan
            Amenidades
        </h3>
        {{ $amenidades->links() }}
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Estatus</th>
                    <th>Residente</th>
                    <th>Descripción</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse($amenidades as $amenidad)
                    <tr>
                        <td>{{ $amenidad->fecha }}</td>
                        <td>{{ $amenidad->tipo->nombre }}</td>
                        <td>{{ $amenidad->estatus->nombre }}</td>
                        <td>{{ $amenidad->residente->name }} {{ $amenidad->residente->amaterno }}
                            {{ $amenidad->residente->apaterno }}</td>
                        <td>{{ $amenidad->descripcion }}</td>
                        <td>
                            @can('detalle_amenidad')
                                <a href="{{ route('detalle_amenidad', $amenidad->id) }}" class="btn btn-info" title="Ver"><i
                                        class="icon-eye"></i></a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Sin resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
