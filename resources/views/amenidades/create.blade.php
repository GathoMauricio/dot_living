@extends('layouts.app')

@section('content')
    <div class="container p-3" style="background-color: white;border: solid 5px #f4f6f9;">
        <h3>
            Crear solicitud de amenidad
        </h3>
        <form action="{{ route('store_amenidad') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_id">Tipo de amenidad</label>
                            <select name="tipo_id" class="form-select select2" required>
                                <option value>Seleccione</option>
                                @foreach ($tipo_amenidades as $tipo)
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="text" name="fecha" value="{{ old('fecha') }}" placeholder="Seleccionar fecha"
                                class="form-control date_time" required>
                            @error('fecha')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
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
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            flatpickr(".date_time", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: "today",
                locale: {
                    firstDayOfWeek: 1,
                    weekdays: {
                        shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                        longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes',
                            'Sábado'
                        ],
                    },
                    months: {
                        shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct',
                            'Nov', 'Dic'
                        ],
                        longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                    },
                },
            });
        });
    </script>
@endsection
