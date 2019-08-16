@if($gpss->first())
    <div class="form-group col-md-6">
    <label for="gpscliente_id">Cambiar GPS a: </label>
    <select name="gpscliente_id" id="gpscliente_id" class="form-control">
        <option value="">Seleccione una Opción</option>
        @foreach($gpss as $g)
        <option value="{{ $g->id }}">{{ $g->serie }} - {{ $g->imei }}</option>
        @endforeach
    </select>
@else
    <div class="row col-md-10 col-offset-1">
        <br>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atención: </strong> No hay registros de GPS's libres para este cliente.
        </div>
    </div>
@endif

<input type="hidden" name="bandera" id="bandera" value="{{ $bandera }}">