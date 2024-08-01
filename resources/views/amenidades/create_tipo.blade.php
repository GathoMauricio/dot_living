<!-- Modal -->
<div class="modal fade" id="create_tipo_amenidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo tipo de amenidad</h5>
            </div>
            <form action="{{ route('store_tipo_amenidad') }}" method="POST" id="form_store_tipo_amenidad">
                @csrf
                <div class="modal-body container">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_tipo_amenidad').modal('hide');" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
