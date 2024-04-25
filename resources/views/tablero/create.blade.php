<!-- Modal -->
<div class="modal fade" id="create_tablero_resiidencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar contenido al tablero de  ❝{{ $residencia->nombre }}❞</h5>
            </div>
            <form action="{{ route('store_tablero_residencias', $residencia->id) }}" method="POST"
                enctype='multipart/form-data'>
                @csrf
                <div class="modal-body container">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="texto">Contenido</label>
                            <input type="text" name="texto" class="form-control"
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12" id="div_adjuntar">
                        <a href="javascript:void(0);" onclick="adjuntarImagen(true);">Adjuntar imagen</a>
                    </div>  
                    <br>
                    <div class="col-md-12" id="div_imagen" style="display:none;">
                        <div class="form-group">
                            <span class="icon icon-cross" onclick="adjuntarImagen(false);" style="float:right;cursor:pointer;"></span>
                            <label for="imagen">Adjunto</label>
                            <input type="file" name="imagen" id="imagen_tablero" class="form-control"
                                accept="image/jpg, image/jpeg, image/png" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#create_tablero_resiidencias').modal('hide');"
                        class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function adjuntarImagen(estado){
        if(estado){
            $("#div_imagen").css('display','block');
            $("#div_adjuntar").css('display','none');
            $("#imagen_tablero").prop('required',true);
        }else{
            $("#div_imagen").css('display','none');
            $("#div_adjuntar").css('display','block');
            $("#imagen_tablero").removeAttr('required');
            $("#imagen_tablero").val('');
        }
    }
</script>