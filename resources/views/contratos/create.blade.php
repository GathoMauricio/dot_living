<!-- Modal -->
<div class="modal fade" id="create_contrato_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear contrato</h5>
            </div>
            <form action="{{ route('store_contrato_usuarios') }}" method="POST">
                @csrf
                <input type="hidden" name="residente_id" value="{{ $usuario->id }}" required>
                <input type="hidden" name="habitacion_id" id="txt_contrato_habitacion_id" required>
                <div class="modal-body container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de inicio</label>
                                <input type="date" name="fecha_inicio" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de fin</label>
                                <input type="date" name="fecha_fin" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 id="lbl_mensaje" class="text-danger text-center"></h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="deposito_num">Deposito</label>
                                <input type="text" name="deposito_num" id="txt_contrato_deposito_num"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="deposito_text"></label>
                                <input type="text" name="deposito_text" id="txt_contrato_deposito_text"
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="renta_num">Renta</label>
                                <input type="text" name="renta_num" id="txt_contrato_renta_num" class="form-control"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="renta_text"></label>
                                <input type="text" name="renta_text" id="txt_contrato_renta_text"
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_contrato_modal').modal('hide');"
                        class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn_guardar_contrato">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
