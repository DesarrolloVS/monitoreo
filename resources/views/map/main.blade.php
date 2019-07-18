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
<!-- Include Draw -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.13/leaflet.draw.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.13/leaflet.draw.css" />
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
    <!--
    <nav class="as-tabs"></nav>
    -->
@include('template.aside_left')
<main class="as-main" data-tab-order="0" data-name="Mapa">
    <!--
            <a href="#" class="btn btn-success btn-xs test" id="">si</a>
            <a href="#" class="btn btn-primary btn-xs test2" id="">no</a>
            -->

            
    <div class="as-map-area">
        <!--
        @//include('template.buscador')
        -->
        <div id="search-visor" class="search-visor">
            <div class="search-visor-form" style="display: block">
                <div id="search" class="input-group">
                    <span id="algo" class="input-group-addon">Localiza tu dirección:</span>
                    <input type="text" id="txtDireccion" name="txtDireccion" placeholder="p. ej. Calle, número, colonia" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>

                
        <div id="map"></div>

        <div class="btn-group-vertical options" role="group">
            <a class="btn btn-primary btn-lg" id="geo_cerca" data-toggle="tooltip" data-placement="right" title="Agregar Geocerca"><i class="fas fa-vector-square"></i></a>
            <a class="btn btn-primary btn-lg" id="control_punto" data-toggle="tooltip" data-placement="right" title="Agregar Punto de Control"><i class="fas fa-bezier-curve"></i></a>
        </div>

        
        
        
        <!--
        <div class="btn-toolbar options" role="toolbar" aria-label="...">
            <div class="btn-group btn-success" role="group" aria-label="...">1</div>
            <div class="btn-group btn-success" role="group" aria-label="...">2</div>
            <div class="btn-group btn-success" role="group" aria-label="...">3</div>
        </div>
-->



        <!--
        <div class="as-map-panels">
            <div class="as-panel as-panel--top as-panel--center">
                <div class="as-panel__element" id="migajas" style="max-width:500px !important">
                </div>
            </div>
        </div>
        -->
    </div>
</main>
<!--
@//include('template.aside_right')
-->
<!--
    </div>
    -->
<!--
    @/*include('template.pushbar')*/
    -->
@include('template.menu')
@include('template.pushbar_bottom')
<!--
<script src="{{ asset('js/template/route.js') }}"></script>
-->

@include('librerias.google')
<script src="{{ asset('js/librerias/google.js') }}"></script>

@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/template/functions.js') }}"></script>
<!--
    <script type="text/javascript" src="{{ asset('js/template/map.js') }}"></script>
    -->

<script type="text/javascript" src="{{ asset('js/template/constants.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/template/constantsLayers.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/template/events.js') }}"></script>

<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>

<script type="text/javascript" src="{{ asset('js/template/main.js') }}"></script>
@endsection