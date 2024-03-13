@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Editar pago
        </h3>
        <form action="{{ route('update_pagos', $pago->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="estatus_id">Estatus</label>
                            <select name="estatus_id" class="form-select">
                                <option value>Seleccione</option>
                                @foreach ($estatuses as $estatus)
                                    @if ($estatus->id == old('estatus_id') || $estatus->id == $pago->estatus_id)
                                        <option value="{{ $estatus->id }}" selected>{{ $estatus->nombre }}</option>
                                    @else
                                        <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('estatus_id')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="residente_id">Residente</label>
                            <select name="residente_id" class="form-select select2" onchange="cargarCantidad();"
                                id="residente_id">
                                <option value>Seleccione</option>
                                @foreach ($residentes as $residente)
                                    @if ($residente->id == old('residente_id') || $residente->id == $pago->residente_id)
                                        <option value="{{ $residente->id }}" selected>
                                            {{ $residente->name }}
                                            {{ $residente->apaterno }}
                                            {{ $residente->amaterno }}
                                        </option>
                                    @else
                                        <option value="{{ $residente->id }}">
                                            {{ $residente->name }}
                                            {{ $residente->apaterno }}
                                            {{ $residente->amaterno }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('residente_id')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipo_id">Tipo de pago</label>
                            <select name="tipo_id" class="form-select" onchange="cargarCantidad();" id="tipo_id">
                                <option value>Seleccione</option>
                                @foreach ($tipos as $tipo)
                                    @if ($tipo->id == old('tipo_id') || $tipo->id == $pago->tipo_id)
                                        <option value="{{ $tipo->id }}" selected>{{ $tipo->nombre }}</option>
                                    @else
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('tipo_id')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="comprobante">Comprobante</label>
                            <input type="file" name="comprobante"
                                accept="application/pdf, image/jpg, image/jpeg, image/png" class="form-control">
                            @error('comprobante')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" value="{{ old('fecha', $pago->fecha) }}"
                                class="form-control">
                            @error('fecha')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" step="0.01" name="cantidad" id="cantidad"
                                value="{{ old('cantidad', $pago->cantidad) }}" class="form-control">
                            @error('cantidad')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $pago->descripcion) }}</textarea>
                            @error('descripcion')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group p-2">
                            <input type="submit" class="btn btn-primary" value="Guardar cambios" style="float:right;">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('custom_scripts')
    <script>
        function cargarCantidad() {
            const residente = $("#residente_id").val();
            const tipo = $("#tipo_id").val();
            if (residente.length > 0 && tipo.length > 0) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('cargar_cantidad_pago') }}",
                    data: {
                        residente: residente,
                        tipo: tipo
                    },
                    success: function(response) {
                        $("#cantidad").val(response.cantidad);
                        $("#descripcion").val(response.descripcion);
                    },
                    error: err => console.log(err)
                });
            } else {
                $("#cantidad").val(0);
                $("#descripcion").val('');
            }
        }
    </script>
@endsection
