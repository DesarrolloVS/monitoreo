<label for="vfecha">Valor o Parametro: </label>
<input class="form-control bg-light shadow-sm @error('vfecha') is-invalid @else border-0 @enderror" type="date" id="vfecha" name="vfecha" placeholder="Valor" value="{{ old('vfecha') }}">
@error('vfecha')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror