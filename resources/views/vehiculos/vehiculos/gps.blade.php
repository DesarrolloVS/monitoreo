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
        <br><br>
        <div class="col-md-10 col-offset-1">
            <h2>Asignar Gps Vehiculo: <small>Placa: {{ $v->placa }} </small></h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="col-md-10 col-offset-1">
            <a class="btn btn-success" href="/cat_vehiculos"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Vehículos</a>
            @if($historico->first())
            <a class="btn btn-info pull-right" href="/cat_vehiculos/{{ $v->id }}/historico"><i class="fas fa-database"></i>&nbsp;&nbsp;&nbsp;Historico GPS</a>
            @endif
        </div>
    </div>

    <div class="row"><br><br>
        <div class="col-md-10 col-offset-1">
            <h3>Gps Actual: {{ ($v->gpscliente_id == "" ) ? "NO ASIGNADO" : $v->gpscliente->imei }} 
            @if($v->gpscliente_id != "")
            &emsp;<a href="/cat_vehiculos/{{ $v->id }}/nogps" class="btn btn-danger btn-xs">Desvincular GPS</a>
            @endif
            </h3>
            @if($v->gpscliente_id != "")
            <h3>Fecha de Asignación: {{ $v->gpscliente->created_at }}</h3>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <form action="/cat_vehiculos/{{ $v->id }}/gps" method="POST">
                @csrf
                @method('put')

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

                <div class="row" id="gpss">

                </div>

                <br><br>
                <div class="text-center" style="display:none" id="asignar"><br><br>
                    <button class="btn btn-primary" type="submit">Asignar Gps</button>
                </div>

                <input type="hidden" name="placa" id="placa" value="{{ $v->placa }}">
                <input type="hidden" name="vehiculo_id" id="vehiculo_id" value="{{ $v->id }}">
                <input type="hidden" name="gpscliente_id_anterior" id="gpscliente_id_anterior" value="{{ $v->gpscliente_id }}">


            </form>

            @if($historico->first())
            @else
            <div class="row col-md-10 col-offset-1">
                <br><br><br><br>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Atención: </strong> No hay registros gps-historicos para este vehiculo.
                </div>
            </div>
            @endif
            <br>
            <br>
        </div>
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
<script src="{{ asset('js/usuario/asignargps.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
@endsection