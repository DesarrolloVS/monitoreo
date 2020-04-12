<div class="row">
    <div class="form-group col-md-4">
        <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
        <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
            <option value="">Seleccione una Opción</option>
            @foreach($mm as $m)
            <option value="{{ $m->id }}">{{ $m->marca }} - {{ $m->modelo }}</option>
            @endforeach
        </select>
        {!! $errors->first('gpsmarcamodelo_id', '<span class="badge badge-danger">:message </span>') !!}
    </div>

    <div class="form-group col-md-4">
        <label for="serie">Serie: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="">
        {!! $errors->first('serie', '<span class="badge badge-danger">:message </span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="paterno">Imei: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="imei" name="imei" placeholder="Imei" value="">
        {!! $errors->first('imei', '<span class="badge badge-danger">:message </span>') !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="puerto">Puerto: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="puerto" name="puerto" placeholder="Puerto" value="">
        {!! $errors->first('puerto', '<span class="badge badge-danger">:message </span>') !!}
    </div>
    <div class="form-group col-md-4">
        <label for="sincronizacion">Sincronización: </label>
        <input class="form-control bg-light shadow-sm border-0" type="text" id="sincronizacion" name="sincronizacion" placeholder="Sincronización" value="">
        {!! $errors->first('sincronizacion', '<span class="badge badge-danger">:message </span>') !!}
    </div>
</div>