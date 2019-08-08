@extends('layouts.app')

@section ('css')
<!-- Fuentes -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:300,400,600" rel="stylesheet">
<!-- Include Airship -->
<link rel="stylesheet" href="https://libs.cartocdn.com/airship-style/v2.0.5/airship.css">
<script src="https://libs.cartocdn.com/airship-components/v2.0.5/airship.js"></script>
<!-- Include Leaflet -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<link href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" rel="stylesheet">
<!-- Include CARTO.js -->
<script src="https://libs.cartocdn.com/carto.js/v4.1.2/carto.min.js"></script>
<link href="https://carto.com/developers/carto-js/examples/maps/public/style.css" rel="stylesheet">
<!-- Include Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- INICIO DE MIS ESTILOS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/template/thisSystem.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
<!-- CSS NOTIFICACIONES ANIMATE -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('css/pushbar/pushbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/template/estilos.css') }}">
<link rel="stylesheet" href="{{ asset('css/template/botons.css') }}">
@endsection

@section('content')
<div class="container montse">
    <div class="row">
        <div class="text-center">
            <br>
            <h2 montseh2>Agregar Vehículo</h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="">
            <a class="btn btn-success" href="/cat_vehiculos"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Vehículos</a>
        </div>
    </div>

    <div class="row">
        <br><br>

        <form action="/cat_vehiculos" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="cliente_id">Cliente: </label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row"><br><br>
            <div class="form-group col-md-3">
                    <label for="descripcion">Descripcion Vehículo: </label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descrpción" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="placa">Placa: </label>
                    <input class="form-control" type="text" id="placa" name="placa" placeholder="Placa" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="marca_id">Marca: </label>
                    <select name="marca_id" id="marca_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($marcas as $m)
                        <option value="{{ $m->id }}">{{ $m->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="submarca_id">Submarca: </label>
                    <select name="submarca_id" id="submarca_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($submarcas as $sub)
                        <option value="{{ $sub->id }}">{{ $sub->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="puertas">Puertas: </label>
                    <input class="form-control" type="text" id="puertas" name="puertas" placeholder="Puertas" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="cilindros">Cilindros: </label>
                    <input class="form-control" type="text" id="cilindros" name="cilindros" placeholder="Cilindros" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="modelo_id">Modelo: </label>
                    <select name="modelo_id" id="modelo_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}">{{ $modelo->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="serie">Serie: </label>
                    <input class="form-control" type="text" id="serie" name="serie" placeholder="Serie" value="">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="chasis">Chasis: </label>
                    <input class="form-control" type="text" id="chasis" name="chasis" placeholder="Chasis" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="capacidad">Capacidad de Carga: </label>
                    <input class="form-control" type="text" id="capacidad" name="capacidad" placeholder="Capacidad" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="procedencia_id">Procedencia: </label>
                    <select name="procedencia_id" id="procedencia_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($procedencias as $procedencia)
                        <option value="{{ $procedencia->id }}">{{ $procedencia->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="tipovehiculo_id">Tipo de Vehículo: </label>
                    <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($tvs as $tv)
                        <option value="{{ $tv->id }}">{{ $tv->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="tipouso_id">Tipo de usos: </label>
                    <select name="tipouso_id" id="tipouso_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($tus as $tu)
                        <option value="{{ $tu->id }}">{{ $tu->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="tipocombustible_id">Tipo de Combustible: </label>
                    <select name="tipocombustible_id" id="tipocombustible_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($tcs as $tc)
                        <option value="{{ $tc->id }}">{{ $tc->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="transmision_id">Tipo de Transmision: </label>
                    <select name="tipotransmision_id" id="tipotransmision_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($tts as $tt)
                        <option value="{{ $tt->id }}">{{ $tt->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="version">Version: </label>
                    <input class="form-control" type="text" id="version" name="version" placeholder="Versión" value="">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="clasevehiculo_id">Clase de Vehículo: </label>
                    <select name="clasevehiculo_id" id="clasevehiculo_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($cvs as $cv)
                        <option value="{{ $cv->id }}">{{ $cv->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="vin">VIN: </label>
                    <input class="form-control" type="text" id="vin" name="vin" placeholder="VIN" value="">
                </div>
                <div class="form-group col-md-3">
                    <label for="rfv">RFV: </label>
                    <input class="form-control" type="text" id="rfv" name="rfv" placeholder="RFV" value="">
                </div>
            </div>

            <br><br>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
            </div>
        </form>
        <br>

    </div>

</div>
@include('template.menu_vehiculos')
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
@endsection