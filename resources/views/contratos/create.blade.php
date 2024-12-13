<!-- Modal -->
<div class="modal fade" id="create_contrato_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear contrato</h5>
            </div>
            <form action="{{ route('store_contrato_usuarios') }}" method="POST">
                @csrf
                <input type="hidden" name="residente_id" value="{{ $usuario->id }}" required>
                <input type="hidden" name="habitacion_id" id="txt_contrato_habitacion_id" required>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="fechas-tab" data-bs-toggle="tab"
                                data-bs-target="#fechas" type="button" role="tab" aria-controls="fechas"
                                aria-selected="true">Fechas y costos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="inventario1-tab" data-bs-toggle="tab"
                                data-bs-target="#inventario1" type="button" role="tab" aria-controls="inventario1"
                                aria-selected="false">
                                Inventario 1/3
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="inventario2-tab" data-bs-toggle="tab"
                                data-bs-target="#inventario2" type="button" role="tab" aria-controls="inventario2"
                                aria-selected="false">
                                Inventario 2/3
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="inventario3-tab" data-bs-toggle="tab"
                                data-bs-target="#inventario3" type="button" role="tab" aria-controls="inventario3"
                                aria-selected="false">
                                Inventario 3/3
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="area1-tab" data-bs-toggle="tab" data-bs-target="#area1"
                                type="button" role="tab" aria-controls="area1" aria-selected="false">
                                Área común 1/2
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="area2-tab" data-bs-toggle="tab" data-bs-target="#area2"
                                type="button" role="tab" aria-controls="area2" aria-selected="false">
                                Área común 2/2
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="notas-tab" data-bs-toggle="tab" data-bs-target="#notas"
                                type="button" role="tab" aria-controls="notas" aria-selected="false">
                                Notas
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="fechas" role="tabpanel">
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
                                        <input type="text" name="renta_num" id="txt_contrato_renta_num"
                                            class="form-control" readonly>
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
                            <br><br><br>
                        </div>
                        <div class="tab-pane fade" id="inventario1" role="tabpanel"
                            aria-labelledby="inventario1-tab">
                            @include('contratos.item_inventario', ['item_propiedad' => 'cama'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'colchon'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'focos'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'ventana_vidrios'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'pintura'])
                        </div>
                        <div class="tab-pane fade" id="inventario2" role="tabpanel"
                            aria-labelledby="inventario2-tab">
                            @include('contratos.item_inventario', [
                                'item_propiedad' => 'perforacion_pared',
                            ])
                            @include('contratos.item_inventario', ['item_propiedad' => 'puertas_rayones'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'chapa'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'juego_llaves'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'regadera_fugas'])
                        </div>
                        <div class="tab-pane fade" id="inventario3" role="tabpanel"
                            aria-labelledby="inventario3-tab">
                            @include('contratos.item_inventario', [
                                'item_propiedad' => 'taza_bano_roturas',
                            ])
                            @include('contratos.item_inventario', ['item_propiedad' => 'lavabo_roturas'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'chapa_ventana'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'enchufes'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'apagadores'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'cortinas'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'mueble_ropa'])
                        </div>
                        <div class="tab-pane fade" id="area1" role="tabpanel" aria-labelledby="area1-tab">
                            @include('contratos.item_inventario', ['item_propiedad' => 'access_point'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'internet'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'television'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'sala'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'menaje_cocina'])

                        </div>
                        <div class="tab-pane fade" id="area2" role="tabpanel" aria-labelledby="area2-tab">
                            @include('contratos.item_inventario', ['item_propiedad' => 'refrigerador'])
                            @include('contratos.item_inventario', [
                                'item_propiedad' => 'horno_microondas',
                            ])
                            @include('contratos.item_inventario', ['item_propiedad' => 'estufa'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'lavadora'])
                            @include('contratos.item_inventario', ['item_propiedad' => 'area_tendido'])
                            @include('contratos.item_inventario', [
                                'item_propiedad' => 'video_vigilancia',
                            ])
                        </div>
                        <div class="tab-pane fade" id="notas" role="tabpanel" aria-labelledby="notas-tab">
                            <div class="row">
                                <div class="form-group">
                                    <label for="notas">Notas</label>
                                    <textarea name="notas" placeholder="Notas..." class="form-control" rows="12"></textarea>
                                </div>
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
