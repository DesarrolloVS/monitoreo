<label for="ventero">Valor o Parametro: </label>
<input class="form-control bg-light shadow-sm @error('ventero') is-invalid @else border-0 @enderror" type="text" id="ventero" name="ventero" placeholder="Valor Entero" value="{{ old('ventero') }}">
@error('ventero')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror