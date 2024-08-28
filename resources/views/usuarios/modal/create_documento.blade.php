<!-- Modal -->
<div class="modal fade" id="create_documento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir documento</h5>
            </div>
            <form action="{{ route('store_documento_usuarios') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                <div class="modal-body container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="texto">Tipo de documento</label>
                                <select name="tipo_id" class="form-control" required>
                                    <option value>--Seleccione--</option>
                                    @foreach ($documentos_tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="documento">Seleccione el archivo</label>
                                <span class="text-primary">(png, jpg,
                                    jpeg, pdf)</span>
                                <input type="file" name="documento" class="form-control"
                                    accept="image/jpg, image/jpeg, image/png, application/pdf" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_documento').modal('hide');" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
