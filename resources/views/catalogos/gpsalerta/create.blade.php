@extends('layoutbasico')
@section ('css')
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_gpsalerta">Catálogo Alertas GPS</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Alerta GPS</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsalerta" method="POST">
                        @csrf
                        <h2 class="text-center">Agregar Alerta GPS</h2>
                        <hr>
                        <div class="row">
                            <div class="col-4 mb-4">
                                <div class="form-group ">
                                    <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                    <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm @error('gpsmarcamodelo_id') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($mm as $m)
                                        <option value="{{ $m->id }}">{{ $m->marca }} - {{ $m->modelo }}</option>
                                        @endforeach
                                    </select>
                                    @error('gpsmarcamodelo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 mb-4" style="display:none" id="div_campos">
                                <div class="form-group" id="complement">
                                    <label for="camposgps_id">Campo: </label>
                                    <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm @error('camposgps_id') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                    @error('camposgps_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 mb-4" style="display:none" id="div_conf">
                                <div class="form-group">
                                    <label for="funcion">Tipo de Configuración Alerta:</label>
                                    <select name="funcion" id="funcion" class="form-control bg-light shadow-sm @error('funcion') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1">Funcion 1</option>
                                        <option value="2">Funcion 2</option>
                                        <option value="3">Funcion 3</option>
                                        <option value="4">Funcion 4</option>
                                        <option value="5">Funcion 5</option>
                                    </select>
                                    @error('funcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 opcional" style="display:none" id="div_alerta">
                                <div class="form-group">
                                    <label for="alerta">Alerta: </label>
                                    <input class="form-control bg-light shadow-sm @error('alerta') is-invalid @else border-0 @enderror" type="text" id="alerta" name="alerta" placeholder="Alerta" value="{{ old('alerta') }}">
                                    @error('alerta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 opcional" style="display:none" id="div_tipoalerta">
                                <div class="form-group">
                                    <label for="tipoalerta">Tipo de Alerta:</label>
                                    <select name="tipoalerta" id="tipoalerta" class="form-control bg-light shadow-sm @error('tipoalerta') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1">Alerta Verde</option>
                                        <option value="2">Alerta Amarilla</option>
                                        <option value="3">Alerta Roja</option>
                                    </select>
                                    @error('tipoalerta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 opcional" style="display:none" id="div_tipovehiculo_id">
                                <div class="form-group">
                                    <label for="tipovehiculo_id">Tipo de Vehículo:</label>
                                    <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control bg-light shadow-sm @error('tipovehiculo_id') is-invalid @else border-0 @enderror">
                                        <option value="">No Aplica</option>
                                        @foreach($tv as $x)
                                        <option value="{{ $x->id }}">{{ $x->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipovehiculo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                            
                            <div class="col-4 opcional" style="display:none" id="div_tipodato">
                                <div class="form-group">
                                    <label for="tipodato">Tipo de Dato: </label>
                                    <select name="tipodato" id="tipodato" class="form-control bg-light shadow-sm @error('tipodato') is-invalid @else border-0 @enderror">
                                        <option value="">No Aplica</option>
                                        <option value="1">Entero</option>
                                        <option value="2">Decimal</option>
                                        <option value="3">Fecha</option>
                                        <option value="4">Booleano</option>
                                        <option value="5">Cadena</option>
                                    </select>
                                    @error('tipodato')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 opcional" style="display:none" id="div_valor">
                                <div class="form-group" id="complement2">
                                    <label for="valor">Valor o Parametro: </label>
                                    <input class="form-control bg-light shadow-sm @error('valor') is-invalid @else border-0 @enderror" type="text" id="valor" name="valor" placeholder="Valor" value="{{ old('valor') }}">
                                    @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 opcional" style="display:none" id="div_repetir">
                                <label for="repetir">Repetir: </label>
                                <div class="form-group input-group">
                                    <input class="input-group form-control bg-light shadow-sm @error('repetir') is-invalid @else @enderror" type="text" id="repetir" name="repetir" placeholder="Repetir" value="{{ old('repetir') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">segundos</span>
                                    </div>
                                </div>
                                @error('repetir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        

                            <div class="col-4 opcional" style="display:none" id="div_revisar">
                                <label for="revisar">Revisar: </label>
                                <div class="form-group input-group">
                                    <input class="input-group form-control bg-light shadow-sm @error('revisar') is-invalid @else @enderror" type="text" id="revisar" name="revisar" placeholder="Revisar" value="{{ old('revisar') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">segundos</span>
                                    </div>
                                </div>
                                @error('revisar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="text-center" id="save" style="display:none">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/catalogos/alertas/complement.js') }}"></script>
@endsection