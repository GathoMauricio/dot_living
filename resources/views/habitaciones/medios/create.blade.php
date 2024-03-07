<!-- Modal -->
<div class="modal fade" id="create_media_habitaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar imagen a ❝{{ $habitacion->alias }}❞</h5>
            </div>
            <form action="{{ route('store_media_habitaciones', $habitacion->id) }}" method="POST"
                enctype='multipart/form-data'>
                @csrf
                <div class="modal-body container">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="imagen" class="form-control"
                                accept="image/jpg, image/jpeg, image/png" required>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="descripcion" placeholder="Ingrese una descripción" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_media_resiidencias').modal('hide');"
                        class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
