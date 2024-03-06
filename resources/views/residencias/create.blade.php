@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Crear residencia
        </h3>
        <form action="{{ route('store_residencias') }}" method="POST">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="auditor_id">Auditor</label>
                            <select name="auditor_id" class="select2 form-control">
                                <option value>Seleccione</option>
                                @foreach ($auditores as $auditor)
                                    @if (old('auditor_id') == $auditor->id)
                                        <option value="{{ $auditor->id }}" selected>
                                            {{ $auditor->name }} {{ $auditor->apaterno }} {{ $auditor->amaterno }}
                                        </option>
                                    @else
                                        <option value="{{ $auditor->id }}">
                                            {{ $auditor->name }} {{ $auditor->apaterno }} {{ $auditor->amaterno }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('auditor_id')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}"
                                placeholder="Nombre o alias de la residencia" class="form-control">
                            @error('nombre')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" value="{{ old('telefono') }}"
                                placeholder="Teléfonode la residencia" class="form-control">
                            @error('telefono')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Email o alias de la residencia" class="form-control">
                            @error('email')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea name="direccion" placeholder="Dirección la residencia" class="form-control">{{ old('direccion') }}</textarea>
                            @error('direccion')
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
