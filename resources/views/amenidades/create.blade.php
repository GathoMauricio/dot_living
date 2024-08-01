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
                            @can('create_tipo_amenidad')
                                <a href="javascript:void(0);" onclick="createTipo();" style="float:right;">
                                    Nuevo tipo
                                </a>
                            @endcan
                            <label for="tipo_id">Tipo de amenidad</label>
                            <select name="tipo_id" class="form-select select2" id="cbo_tipo_id" required>
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
    @include('amenidades.create_tipo')
@endsection
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $("#form_store_tipo_amenidad").submit(function(e) {
                e.preventDefault();
                axios.post('{{ route('store_tipo_amenidad') }}', $("#form_store_tipo_amenidad")
                        .serialize())
                    .then((response) => {
                        $("#cbo_tipo_id").html('');
                        var html = '<option value>Seleccione</option>';
                        $.each(response.data, function(index, item) {
                            html += `<option value='${item.id}'>${item.nombre}</option>`;
                        });
                        $("#cbo_tipo_id").html(html);
                        $("#create_tipo_amenidad").modal('hide');
                        successNotification("Registro agregado");
                    }, (error) => {
                        console.log(error);
                        $("#create_tipo_amenidad").modal('hide');
                        errorNotification("Error durante la petición");
                    });
            });
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

        function createTipo() {
            $("#create_tipo_amenidad").modal('show');
        }
    </script>
@endsection
