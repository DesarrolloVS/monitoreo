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
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
-->
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
        <div class="">
        <br><br>
            <h2 class="text-center montseh2">CATÁLOGO ALERTAS GPS</h1>
        </div>
    </div>
    <div class="row">
        <div class="">
            <br><br>
            <a class="btn btn-primary" href="/cat_gpsalerta/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Registro</a>
        </div>
    </div>

    @if($alertas->first())
    <div class="row">
        <br><br>
        <div class="">
            <table class="table table-bordered table-condensed">
                <th class="text-center">Id</th>
                <th class="text-center">Alerta</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Modelo</th>
                <th class="text-center">Campo</th>
                <th class="text-center">Condicion</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Modificar</th>
                <th class="text-center">Eliminar</th>
                @foreach($alertas as $x)
                <tr>
                    <td class="text-center">{{ $x->id }}</td>
                    <td class="text-center">{{ $x->alerta }}</td>
                    <td class="text-center">{{ $x->gpsmarcamodelo->marca }}</td>
                    <td class="text-center">{{ $x->gpsmarcamodelo->modelo }}</td>
                    <td class="text-center">{{ $x->camposgps->descripcion }}</td>
                    <td class="text-center">{{ $x->condicion }}</td>
                    <td class="text-center">{{ $x->valor }}</td>
                    <td class="text-center"><a class="btn btn-info btn-xs" href="#">{{ ($x->estado == false ) ? "INACTIVO" : "ACTIVO" }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                    <td class="text-center"><a class="btn btn-success btn-xs" href="#"><i class="fas fa-pencil-alt"></i></a></td>                    
                    <td class="text-center"><a class="btn btn-danger btn-xs" href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @else
    <div class="row ">
    <br><br><br><br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Atención: </strong> No hay registros para este catálogo.
    </div>
    </div>
    @endif
</div>

@include('template.menu_gps')
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