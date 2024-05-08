@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Crear reporte
        </h3>
        <form action="{{ route('store_reportes') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tipo_id">Tipo de reporte</label>
                            <select name="tipo_id" class="form-select">
                                <option value>Seleccione</option>
                                @foreach ($tipo_reportes as $tipo)
                                    @if ($tipo->id == old('tipo_id'))
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
                    <div class="col-md-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
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
