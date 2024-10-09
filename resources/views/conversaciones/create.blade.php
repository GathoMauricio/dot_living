<!-- Modal -->
<div class="modal fade" id="create_conversacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva conversación</h5>
            </div>
            <form action="{{ route('store_conversacion') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="modal-body container">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="texto">Asunto</label>
                            <input type="text" name="asunto" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_conversacion').modal('hide');" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
