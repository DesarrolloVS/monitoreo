@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                <h2 class="text-center montseh2">CATÁLOGO ALERTAS CLIENTE</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-4 pt-3">
                    <div class="form-group">
                        <label for="cliente_id">Cliente: </label>
                        <select name="cliente_id" id="cliente_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-4 pt-3">
                    <div id="mm" style="display:none">
                        <label for="gpscliente_id">GPS (Marca - Modelo): </label>
                        <select name="gpscliente_id" id="gpscliente_id" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
            <div class="row">
                <div class="col my-3" id="tabla_alertas"></div>
            </div>

            <div class="row">
                <div class="col my-5" id="res"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/cliente/alertas/cliente.js') }}"></script>
@endsection