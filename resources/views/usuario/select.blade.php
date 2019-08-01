<label for="tipoempleado_id">Tipo de empleado: </label>
<select name="tipoempleado_id" id="tipoempleado_id" class="form-control">
    <option value="">Seleccione una Opción</option>
    @foreach($tes as $te)
    <option value="{{ $te->id }}">{{ $te->descripcion }}</option>
    @endforeach
</select>