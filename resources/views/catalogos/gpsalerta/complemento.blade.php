<!-- <label for="camposgps_id">Campo: </label>
<select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0"> -->
<option value="">Seleccione una Opción</option>
@foreach($campos as $c)
<option value="{{ $c->camposgps_id }}">{{ $c->camposgps->descripcion }}</option>
@endforeach
<!-- </select> -->