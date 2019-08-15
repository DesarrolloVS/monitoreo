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
        <div class="col-md-10 col-offset-1">
        <br><br>
            <h2 class="text-center montseh2">CATÁLOGO VEHICULOS</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-primary pull-right" href="/cat_vehiculos/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Vehículo</a>
        </div>
    </div>

    @if($vehiculos->first())
    <div class="row">
        <br><br>
        <div class="col-md-10 col-offset-1">
            <table class="table table-bordered">
                <th class="text-center">Id</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Submarca</th>
                <th class="text-center">Placa</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Gps</th>
                <th class="text-center">Modificar</th>
                <th class="text-center">Eliminar</th>
                @foreach($vehiculos as $x)
                <tr>
                    <td class="text-center">{{ $x->id }}</td>
                    <td class="text-center">{{ $x->marca->descripcion }}</td>
                    <td class="text-center">{{ $x->submarca->descripcion }}</td>
                    <td class="text-center">{{ $x->placa }}</td>
                    <td class="text-center"><a class="btn btn-info btn-xs" href="/cat_vehiculos/{{ $x->id }}/estatus">{{ ($x->estadovehiculo_id == "" ) ? estatus_vehiculos($x->estadovehiculo_id) : $x->estadovehiculo->descripcion }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                    <td class="text-center"><a class="btn btn-primary btn-xs" href="/cat_vehiculos/{{ $x->id }}/gps">{{ ($x->gpscliente_id == "" ) ? "NO ASIGNADO" : $x->gpscliente->imei }}&emsp;<i class="fas fa-location-arrow"></i></a></td>
                    <td class="text-center"><a class="btn btn-success btn-xs" href="/cat_vehiculos/{{ $x->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                    <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_vehiculos/{{ $x->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @else
    <div class="row col-md-10 col-offset-1">
    <br><br><br><br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Atención: </strong> No hay registros para este catálogo.
    </div>
    </div>
    @endif
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