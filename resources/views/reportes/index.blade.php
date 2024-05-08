@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            @can('crear_reportes')
                <div style="float: right;">
                    <a href="{{ route('crear_reportes') }}" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
            @endcan
            Reportes
        </h3>
        {{ $reportes->links() }}
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
                @forelse($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->created_at }}</td>
                        <td>{{ $reporte->tipo->nombre }}</td>
                        <td>{{ $reporte->estatus->nombre }}</td>
                        <td>{{ $reporte->residente->name }} {{ $reporte->residente->amaterno }}
                            {{ $reporte->residente->apaterno }}</td>
                        <td>{{ $reporte->descripcion }}</td>
                        <td>
                            @can('detalle_reportes')
                                <a href="{{ route('detalle_reportes', $reporte->id) }}" class="btn btn-info" title="Ver"><i
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
