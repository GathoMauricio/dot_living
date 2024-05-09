@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Editar tipo de reporte
        </h3>
        <form action="{{ route('update_reporte', $tipo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre">Tipo</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $tipo->nombre) }}"
                                class="form-control">
                            @error('nombre')
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
    </div>
@endsection
