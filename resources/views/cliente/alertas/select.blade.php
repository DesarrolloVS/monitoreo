<option value="">Seleccione una Opción</option>
@foreach($rs as $x)
<option value="{{ $x->gpsmarcamodelo_id }}|{{ $x->id }}">{{ $x->serie }} - {{ $x->imei }}</option>
@endforeach


