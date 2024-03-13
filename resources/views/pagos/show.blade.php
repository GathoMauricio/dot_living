@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Detalle pago
        </h3>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    Fecha de pago:
                </div>
                <div class="col-md-6">
                    {{ $pago->fecha }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Tipo:
                </div>
                <div class="col-md-6">
                    {{ $pago->tipo->nombre }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Estatus:
                </div>
                <div class="col-md-6">
                    {{ $pago->estatus->nombre }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Cantidad:
                </div>
                <div class="col-md-6">
                    ${{ $pago->cantidad }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Residencia:
                </div>
                <div class="col-md-6">
                    @if ($pago->residente->habitacion->residencia->nombre)
                        {{ $pago->residente->habitacion->residencia->nombre }}
                    @else
                        No disponible
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Habitación:
                </div>
                <div class="col-md-6">
                    @if ($pago->residente->habitacion->alias)
                        {{ $pago->residente->habitacion->alias }}
                    @else
                        No disponible
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Residente:
                </div>
                <div class="col-md-6">
                    {{ $pago->residente->name }}
                    {{ $pago->residente->apaterno }}
                    {{ $pago->residente->amaterno }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Comprobante:
                </div>
                <div class="col-md-6">
                    @if ($pago->comprobante)
                        <a href="{{ asset('storage/comprobantes/' . $pago->comprobante) }}" target="_BLANK"
                            class="btn btn-success">
                            <span class="icon icon-download"></span> <strong>Descargar</strong>
                        </a>
                    @else
                        @can('cargar_comprobante_pagos')
                            <button class="btn btn-primary">
                                <span class="icon icon-upload"></span> <strong>Cargar</strong>
                            </button>
                        @endcan
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    Descripción:
                </div>
                <div class="col-md-6">
                    {{ $pago->descripcion }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
@endsection
