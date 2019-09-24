<label for="vcadena">Valor o Parametro: </label>
<input class="form-control bg-light shadow-sm @error('vcadena') is-invalid @else border-0 @enderror" type="text" id="vcadena" name="vcadena" placeholder="Valor Cadena" value="{{ old('vcadena') }}">
@error('vcadena')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror