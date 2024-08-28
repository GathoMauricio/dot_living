<!-- Modal -->
<div class="modal fade" id="create_foto_habitacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir foto de la habitación</h5>
            </div>
            <form action="{{ route('store_foto_habitacion_usuarios') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                <div class="modal-body container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="texto">Tipo de foto</label>
                                <select name="tipo_id" class="form-control" required>
                                    <option value>--Seleccione--</option>
                                    @foreach ($foto_tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Seleccione el archivo</label>
                                <span class="text-primary">(png, jpg,
                                    jpeg)</span>
                                <input type="file" name="foto" class="form-control"
                                    accept="image/jpg, image/jpeg, image/png" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea type="file" name="descripcion" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_foto_habitacion').modal('hide');"
                        class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
