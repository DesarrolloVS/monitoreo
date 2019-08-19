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
        <div class="">
            <h2>Responsables Actuales: <small>Placa: {{ $v->placa }} </small></h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="justifyc">
        <div>
            <a class="btn btn-primary" href="/cat_vehiculos/{{ $v->id }}/resp"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Regresar a Asignar Responsable</a>
        </div>
        <div>
            <a class="btn btn-success" href="/cat_vehiculos">Ir a Catálogo Vehículos</a>
        </div>
        </div>
    </div>

    <div class="row">

        <br><br>
        <div class="">
            <table class="table table-bordered">
                <th class="text-center">Id</th>
                <th class="text-center">Placa</th>
                <th class="text-center">Responsable</th>
                <th class="text-center">Fecha de asignacion</th>
                <th class="text-center">Eliminar Responsable</th>
                @foreach($res as $h)
                <tr>
                    <td class="text-center">{{ $h->id }}</td>
                    <td class="text-center">{{ $v->placa }}</td>
                    <td class="text-center">{{ str_limit($h->usuario->nombre." ".$h->usuario->paterno." ".$h->usuario->materno,30) }}</td>
                    <td class="text-center">{{ $h->created_at }}</td>
                    <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_vehiculos/{{ $h->id }}/deleteResponsable"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </table>
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