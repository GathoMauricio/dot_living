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
        <h3>
            @can('crear_media_habitaciones')
                <div style="float: right;">
                    <a href="#" class="btn btn-primary" title="Nuevo"><i class="icon icon-plus"></i></a>
                </div>
            @endcan
            Multimedia
        </h3>
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    Foto
                </div>
                <div class="col-md-4 text-center">
                    Foto
                </div>
                <div class="col-md-4 text-center">
                    Foto
                </div>
                <div class="col-md-4 text-center">
                    Foto
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
@endsection
