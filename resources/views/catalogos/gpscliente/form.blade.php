<div class="row">
    <div class="form-group col-md-4">
        <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
        <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control">
            <option value="">Seleccione una Opción</option>
            @foreach($mm as $m)
            <option value="{{ $m->id }}">{{ $m->marca }} - {{ $m->modelo }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="serie">Serie: </label>
        <input class="form-control" type="text" id="serie" name="serie" placeholder="Serie" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="paterno">Imei: </label>
        <input class="form-control" type="text" id="imei" name="imei" placeholder="Imei" value="">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="puerto">Puerto: </label>
        <input class="form-control" type="text" id="puerto" name="puerto" placeholder="Puerto" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="sincronizacion">Sincronización: </label>
        <input class="form-control" type="text" id="sincronizacion" name="sincronizacion" placeholder="Sincronización" value="">
    </div>
</div>