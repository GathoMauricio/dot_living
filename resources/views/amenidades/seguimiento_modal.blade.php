<!-- Modal -->
<div class="modal fade" id="create_seguimientos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar seguimiento</h5>
            </div>
            <form action="{{ route('store_seguimiento_amenidad') }}" method="POST">
                @csrf
                <input type="hidden" name="amenidad_id" value="{{ $amenidad->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="texto">Ingrese su comentario</label>
                        <textarea name="texto" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        onclick="$('#create_seguimientos_modal').modal('hide');" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
