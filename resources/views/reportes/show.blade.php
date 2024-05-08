@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Detalle reporte
        </h3>
        <div class="row">
            <div class="col-md-6">
                Autor:
            </div>
            <div class="col-md-6">
                {{ $reporte->residente->name }} {{ $reporte->residente->apaterno }} {{ $reporte->residente->amaterno }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                Tipo:
            </div>
            <div class="col-md-6">
                {{ $reporte->tipo->nombre }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                Estatus:
            </div>
            <div class="col-md-6">
                {{ $reporte->estatus->nombre }}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                Descripción:
            </div>
            <div class="col-md-6">
                {{ $reporte->descripcion }}
            </div>
        </div>
        <br>
    </div>
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            @if ($reporte->estatus_id < 5)
                <div style="float: right;">
                    <a href="javascript:void(0)" onclick="createAdjunto();" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
            @endif
            Adjuntos <small style="font-size: 12px;">(image/jpg, image/jpeg, image/png, video/mp4)</small>
        </h3>
        <div class="container">
            <div class="row">
                @forelse ($reporte->adjuntos as $adjunto)
                    <div class="col-md-3 text-center">
                        <div class="card">
                            {{--  @can('eliminar_medio_residencias')
                                <div class="card-header">
                                    <div style="float: right;">
                                        <a href="javascript:void(0);" onclick="deleteMedio({{ $medio->id }});"
                                            class="btn btn-danger" title="Eliminar"><i class="icon icon-bin"></i></a>
                                        <form action="{{ route('delete_media_residencias', $medio->id) }}"
                                            id="form_delete_medio_{{ $medio->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            @endcan  --}}
                            <div class="card-header">
                                <h6>
                                    {{ $adjunto->autor->name }} {{ $adjunto->autor->apaterno }}
                                    {{ $adjunto->autor->amaterno }}
                                </h6>
                            </div>
                            <div class="card-body">
                                @if ($adjunto->mimetype == 'video/mp4')
                                    <video src="{{ asset('storage/adjunto_reportes/' . $adjunto->ruta) }}"
                                        style="width:100%;height:200px;" controls></video>
                                @else
                                    <a href="{{ asset('storage/adjunto_reportes/' . $adjunto->ruta) }}" target="_BLANK">
                                        <img src="{{ asset('storage/adjunto_reportes/' . $adjunto->ruta) }}"
                                            alt="{{ $adjunto->ruta }}" style="width:100%;height:200px;">
                                    </a>
                                @endif
                            </div>
                            <div class="card-footer">
                                {{ $adjunto->descripcion }}
                            </div>
                        </div>
                    </div>
                @empty
                    <center>No se encontraron medios</center>
                @endforelse
            </div>
        </div>
    </div>
    @include('reportes.adjunto_modal')
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
