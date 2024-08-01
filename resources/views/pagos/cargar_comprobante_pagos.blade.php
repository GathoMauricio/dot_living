<!-- Modal -->
<div class="modal fade" id="cargar_comprobante_pagos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar comprobante</h5>
            </div>
            <form action="{{ route('cargar_comprobante_pagos') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="pago_id" id="txt_pago_id">
                <div class="modal-body container">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="comprobante" class="form-control"
                                accept="application/pdf, image/jpg, image/jpeg, image/png" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#cargar_comprobante_pagos').modal('hide');"
                        class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
