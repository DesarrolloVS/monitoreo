@extends('layout')

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
                        <li class="breadcrumb-item"><a href="/cat_gpscliente">Catálogo GPS Cliente</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpscliente/{{ $gps->id }}" method="POST">
                        <h2 class="text-center">Modificar Registro</h2>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" 
                                    @if($cliente->id == $gps->cliente_id)
                                    selected
                                    @endif
                                    >{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="datos_gps">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                    <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($mm as $m)
                                        <option value="{{ $m->id }}" 
                                        @if($m->id == $gps->gpsmarcamodelo_id)
                                        selected
                                        @endif
                                        >{{ $m->marca }} - {{ $m->modelo }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="serie">Serie: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="{{ $gps->serie }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="paterno">Imei: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="imei" name="imei" placeholder="Imei" value="{{ $gps->imei }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="puerto">Puerto: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="puerto" name="puerto" placeholder="Puerto" value="{{ $gps->puerto }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sincronizacion">Sincronización: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="sincronizacion" name="sincronizacion" placeholder="Sincronización" value="{{ $gps->sincronizacion }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center" id="submit_form">
                            <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/usuario/gpscliente.js') }}"></script>
@endsection