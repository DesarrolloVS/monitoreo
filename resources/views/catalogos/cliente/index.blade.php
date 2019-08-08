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
        <div class="col-md-10 col-offset-1">
        <br><br>
            <h2 class="text-center montseh2">CATÁLOGO CLIENTES</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-primary" href="/cat_clientes/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Cliente</a>
        </div>
    </div>

    @if($clientes->first())
    <div class="row">
        <br><br>
        <div class="col-md-10 col-offset-1">
            <table class="table table-bordered">
                <th class="text-center">Id</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">RFC</th>
                <th class="text-center">Contacto</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Logo</th>
                <th class="text-center">Domicilio</th>
                <th class="text-center">Modificar</th>
                <!--
                <th class="text-center">Eliminar</th>
                -->
                @foreach($clientes as $cliente)
                <tr>
                    <td class="text-center">{{ $cliente->id }}</td>
                    <td class="text-center">{{ $cliente->nombre }}</td>
                    <td class="text-center">{{ $cliente->rfc }}</td>
                    <td class="text-center">{{ $cliente->usuario_id }}</td>
                    <td class="text-center"><a href="/cat_clientes/{{ $cliente->id }}/estatus" class="btn btn-warning btn-xs">{{ $cliente->estadocliente_id }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                    <td class="text-center">
                        @if($cliente->logo)
                        <a href="{{ asset('logos/') }}/{{ $cliente->logo }}" target="_blank" class="btn btn-info btn-xs">Ver Logo</a>
                        @endif
                    </td>
                    <td class="text-center"><a class="btn btn-primary btn-xs" href="/cat_clientes/{{ $cliente->id }}/domicilios">Domicilios</a></td>
                    <td class="text-center"><a class="btn btn-success btn-xs" href="/cat_clientes/{{ $cliente->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                    <!--
                    <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_clientes/{{ $cliente->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                    -->
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
        <strong>Atecion: </strong> No hay registros para este catálogo.
    </div>
    </div>
    @endif
</div>

@include('template.menu_catalogos')
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
<!--
<script type="text/javascript" src="{{ asset('js/template/functions.js') }}"></script>
-->
<!--
    <script type="text/javascript" src="{{ asset('js/template/map.js') }}"></script>
    -->
<!--
<script type="text/javascript" src="{{ asset('js/template/constants.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/template/constantsLayers.js') }}"></script>
-->
<!--
<script type="text/javascript" src="{{ asset('js/template/events.js') }}"></script>
-->
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<!--
<script type="text/javascript" src="{{ asset('js/template/main.js') }}"></script>
-->
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
<!--
<script type="text/javascript" src="{{ asset('js/template/functions.js') }}"></script>
-->
<!--
    <script type="text/javascript" src="{{ asset('js/template/map.js') }}"></script>
    -->
<!--
<script type="text/javascript" src="{{ asset('js/template/constants.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/template/constantsLayers.js') }}"></script>
-->
<!--
<script type="text/javascript" src="{{ asset('js/template/events.js') }}"></script>
-->
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
<!--
<script type="text/javascript" src="{{ asset('js/template/main.js') }}"></script>
-->
@endsection