<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="estatus_{{ $item_propiedad }}">{{ str_replace('_', ' ', ucwords($item_propiedad)) }}</label>
            <select name="estatus_{{ $item_propiedad }}" class="form-select">
                <option value="OK">OK</option>
                <option value="SUCIO">SUCIO</option>
                <option value="ROTO">ROTO</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="observaciones_{{ $item_propiedad }}">Observaciones</label>
            <input type="text" name="observaciones_{{ $item_propiedad }}" placeholder="Observaciones..."
                class="form-control" />
        </div>
    </div>
</div>
