<label for="submarca_id">Submarca: </label>
<select name="submarca_id" id="submarca_id" class="form-control form-control-sm bg-light shadow-sm border-0">
    <option value="">Seleccione una Opción</option>
    @foreach($submarcas as $sub)
    <option value="{{ $sub->id }}">{{ $sub->descripcion }}</option>
    @endforeach
</select>