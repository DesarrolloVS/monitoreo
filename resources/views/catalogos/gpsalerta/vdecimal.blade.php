<label for="vdecimal">Valor o Parametro: </label>
<input class="form-control bg-light shadow-sm @error('vdecimal') is-invalid @else border-0 @enderror" type="text" id="vdecimal" name="vdecimal" placeholder="Valor Decimal" value="{{ old('vdecimal') }}">
@error('vdecimal')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror