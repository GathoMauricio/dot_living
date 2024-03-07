@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Actualizar habitación
        </h3>
        <form action="{{ route('update_habitaciones', $habitacion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alias">Alias</label>
                            <input type="text" name="alias" value="{{ old('alias', $habitacion->alias) }}"
                                placeholder="Alias de la habitación" class="form-control">
                            @error('alias')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medidas">Medidas</label>
                            <input type="text" name="medidas" value="{{ old('medidas', $habitacion->medidas) }}"
                                placeholder="Medidas de la habitación" class="form-control">
                            @error('medidas')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="renta">Renta</label>
                            <input type="text" name="renta" value="{{ old('renta', $habitacion->renta) }}"
                                placeholder="Renta de la habitación" class="form-control">
                            @error('renta')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="deposito">Depósito</label>
                            <input type="text" name="deposito" value="{{ old('deposito', $habitacion->deposito) }}"
                                placeholder="Depósito de la habitación" class="form-control">
                            @error('deposito')
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
                            <textarea name="descripcion" placeholder="Descripción de la habitación" class="form-control">{{ old('descripcion', $habitacion->descripcion) }}</textarea>
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
@endsection
