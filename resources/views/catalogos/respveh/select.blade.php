<label for="usuario_id">Usuarios: </label>
<select name="usuario_id" id="usuario_id" class="form-control">
    <option value="">Seleccione una Opción</option>
    @foreach($us as $u)
    <option value="{{ $u->id }}">{{ $u->nombre." ".$u->paterno." ".$u->materno }}</option>
    @endforeach
</select>