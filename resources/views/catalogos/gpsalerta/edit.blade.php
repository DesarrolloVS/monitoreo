@extends('layoutbasico')
@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_gpsalerta">Catálogo Alertas GPS</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsalerta/{{ $ga->id }}" method="POST">
                        @csrf
                        @method('put')
                        <h2 class="text-center">Modificar Alerta GPS</h2>
                        <hr>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($mm as $m)
                                    <option value="{{ $m->id }}" 
                                    @if($m->id == $ga->gpsmarcamodelo_id)
                                    selected
                                    @endif
                                    >{{ $m->marca }} - {{ $m->modelo }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="alerta">Alerta: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="alerta" name="alerta" placeholder="Alerta" value="{{ $ga->alerta }}">
                                    {!! $errors->first('alerta', '<small style="color:red">:message</small>') !!}
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tipoalerta">Tipo de Alerta:</label>
                                    <select name="tipoalerta" id="tipoalerta" class="form-control bg-light shadow-sm @error('tipoalerta') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1" 
                                        @if($ga->tipoalerta == 1)
                                        selected
                                        @endif
                                        >Alerta Verde</option>
                                        <option value="2" 
                                        @if($ga->tipoalerta == 2)
                                        selected
                                        @endif
                                        >Alerta Amarilla</option>
                                        <option value="3" 
                                        @if($ga->tipoalerta == 3)
                                        selected
                                        @endif
                                        >Alerta Roja</option>
                                    </select>
                                    @error('tipoalerta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tipovehiculo_id">Tipo de Vehículo:</label>
                                    <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control bg-light shadow-sm @error('tipovehiculo_id') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($tv as $x)
                                        <option value="{{ $x->id }}" 
                                        @if($ga->tipovehiculo_id == $x->id)
                                        selected
                                        @endif
                                        >{{ $x->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipovehiculo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group col" id="complement">
                                    <label for="camposgps_id">Campo: </label>
                                    <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($campos as $c)
                                        <option value="{{ $c->camposgps_id }}" 
                                        @if($c->camposgps_id == $campo)
                                        selected
                                        @endif
                                        >{{ $c->camposgps->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('camposgps_id', '<small style="color:red">:message</small>') !!}
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="tipodato">Tipo de Dato: </label>
                                    <select name="tipodato" id="tipodato" class="form-control bg-light shadow-sm @error('tipodato') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1" 
                                        @if($ga->tipodato == 1)
                                        selected
                                        @endif
                                        >Entero</option>
                                        <option value="2" 
                                        @if($ga->tipodato == 2)
                                        selected
                                        @endif
                                        >Decimal</option>
                                        <option value="3" 
                                        @if($ga->tipodato == 3)
                                        selected
                                        @endif
                                        >Fecha</option>
                                        <option value="4" 
                                        @if($ga->tipodato == 4)
                                        selected
                                        @endif
                                        >Booleano</option>
                                        <option value="5" 
                                        @if($ga->tipodato == 5)
                                        selected
                                        @endif
                                        >Cadena</option>
                                    </select>
                                    @error('tipodato')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group" id="complement2">
                                    <label for="valor">Valor o Parametro: </label>
                                    <input class="form-control bg-light shadow-sm @error('valor') is-invalid @else border-0 @enderror" type="text" id="valor" name="valor" placeholder="Valor" value="{{ $valor }}">
                                    @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="funcion">Tipo de Confirmación Alerta:</label>
                                    <select name="funcion" id="funcion" class="form-control bg-light shadow-sm @error('funcion') is-invalid @else border-0 @enderror">
                                        <option value="">Seleccione una Opción</option>
                                        <option value="1" 
                                        @if($ga->funcion == 1)
                                        selected
                                        @endif
                                        >Funcion 1</option>
                                        <option value="2" 
                                        @if($ga->funcion == 2)
                                        selected
                                        @endif
                                        >Funcion 2</option>
                                        <option value="3" 
                                        @if($ga->funcion == 3)
                                        selected
                                        @endif
                                        >Funcion 3</option>
                                    </select>
                                    @error('funcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col">
                                <label for="repetir">Repetir: </label>
                                <div class="form-group input-group">
                                    <input class="input-group form-control bg-light shadow-sm @error('repetir') is-invalid @else @enderror" type="text" id="repetir" name="repetir" placeholder="Repetir" value="{{ $ga->repetir }}">
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
                            

                            <div class="col">
                                <label for="revisar">Revisar: </label>
                                <div class="form-group input-group">
                                    <input class="input-group form-control bg-light shadow-sm @error('revisar') is-invalid @else @enderror" type="text" id="revisar" name="revisar" placeholder="Revisar" value="{{ $ga->revisar }}">
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
                        <button class="btn btn-primary btn-block" type="submit">Modificar</button>

                    </form>
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