@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Detalle habitación ❝{{ $habitacion->alias }}❞
        </h3>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Alias:
                </div>
                <div class="col-md-6">
                    {{ $habitacion->alias }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Residencia:
                </div>
                <div class="col-md-6">
                    {{ $habitacion->residencia->nombre }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Medidas:
                </div>
                <div class="col-md-6">
                    {{ $habitacion->medidas }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Renta:
                </div>
                <div class="col-md-6">
                    ${{ $habitacion->renta }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Depósito:
                </div>
                <div class="col-md-6">
                    ${{ $habitacion->deposito }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Descripción:
                </div>
                <div class="col-md-6">
                    {{ $habitacion->descripcion }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Residente:
                </div>
                <div class="col-md-6">
                    @if (!empty($habitacion->residente))
                        {{ $habitacion->residente->name }}
                        {{ $habitacion->residente->apaterno }}
                        {{ $habitacion->residente->amaterno }}
                    @else
                        No disponible
                    @endif
                </div>
            </div>
            <br>
        </div>
        <hr>
        <h3>
            @can('crear_medio_habitaciones')
                <div style="float: right;">
                    <a href="javascript:void(0);" onclick="createMedio();" class="btn btn-primary" title="Nuevo"><i
                            class="icon icon-plus"></i></a>
                </div>
            @endcan
            Multimedia
        </h3>
        <div class="container">
            <div class="row">
                @foreach ($habitacion->medios as $medio)
                    <div class="col-md-3 text-center">
                        <div class="card">
                            @can('eliminar_medio_habitaciones')
                                <div class="card-header">
                                    <div style="float: right;">
                                        <a href="javascript:void(0);" onclick="deleteMedio({{ $medio->id }});"
                                            class="btn btn-danger" title="Eliminar"><i class="icon icon-bin"></i></a>
                                        <form action="{{ route('delete_media_habitaciones', $medio->id) }}"
                                            id="form_delete_medio_{{ $medio->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            @endcan
                            <div class="card-body">
                                <img src="{{ asset('storage/habitaciones/' . $medio->ruta) }}" alt="{{ $medio->ruta }}"
                                    style="width:100%;height:200px;">
                            </div>
                            <div class="card-footer">
                                {{ $medio->descripcion }}
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (count($habitacion->medios) <= 0)
                    <center>No se encontraron medios</center>
                @endif
            </div>
        </div>
    </div>
    @include('habitaciones.medios.create', compact('habitacion'))
@endsection
@section('custom_scripts')
    <script>
        function createMedio() {
            $("#create_media_habitaciones").modal('show');
        }

        function deleteMedio(id) {
            alertify.confirm('Aviso', '¿Realmente desea eliminar este registro?', function() {
                $("#form_delete_medio_" + id).submit();
            }, function() {});
        }
    </script>
@endsection
