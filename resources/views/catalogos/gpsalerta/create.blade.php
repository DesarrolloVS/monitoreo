@extends('layout')
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
                        <li class="breadcrumb-item active" aria-current="">Agregar Alerta GPS</li>
                    </ol>
                </div>
    
            </div>

            <div class="row">
                <div class="col"><br>
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsalerta" method="POST">
                        @csrf
                        <h2 class="text-center">Agregar Alerta GPS</h2>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-4">
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
                        <!-- <div id="complement"></div> -->

                        <div class="row">
                            <br><br>
                            <div class="form-group col">
                                <label for="alerta">Alerta: </label>
                                <input class="form-control bg-light shadow-sm @error('alerta') is-invalid @else border-0 @enderror" type="text" id="alerta" name="alerta" placeholder="Alerta" value="{{ old('alerta') }}">
                                @error('alerta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md">
                                <label for="descripcion">Descripción: </label>
                                <input class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border-0 @enderror" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col" id="complement">
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

                            <div class="form-group col">
                                <label for="condicion">Condicion: </label>
                                <select name="condicion" id="condicion" class="form-control bg-light shadow-sm @error('condicion') is-invalid @else border-0 @enderror">
                                    <option value="">Seleccione una Opción</option>
                                    <option value="<">Menor</option>
                                    <option value=">">Mayor</option>
                                    <option value="=">Igual</option>
                                </select>
                                @error('condicion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="valor">Valor: </label>
                                <input class="form-control bg-light shadow-sm @error('valor') is-invalid @else border-0 @enderror" type="text" id="valor" name="valor" placeholder="Valor" value="{{ old('valor') }}">
                                @error('valor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <br><br>
                        <div class="text-center" id="save" style="display:none">
                            <button class="btn btn-primary btn-lg btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
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