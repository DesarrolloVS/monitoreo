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
            <h2 montseh2>Agregar Traza</h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="">
            <a class="btn btn-success" href="/cat_trazas"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Trazas</a>
        </div>
    </div>

    <div class="row">
        <br><br>

        <form action="/cat_trazas" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                    <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($mm as $m)
                        <option value="{{ $m->id }}">{{ $m->marca }} - {{ $m->modelo }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>') !!}
                </div>
            </div>

            <div class="row">
            <br><br>
                <div class="form-group col-md-4">
                    <label for="descripcion">Descripción: </label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                    {!! $errors->first('descripcion', '<small style="color:red">:message</small>') !!}
                </div>
                <div class="form-group col-md-4">
                    <label for="descripcion">Número de Posiones: </label>
                    <input class="form-control" type="text" id="num_posiciones" name="num_posiciones" placeholder="Número de Posiciones" value="{{ old('num_posiciones') }}">
                    {!! $errors->first('num_posiciones', '<small style="color:red">:message</small>') !!}
                </div>
                <div class="form-group col-md-4">
                    <label for="tipotraza_id">Tipo Traza: </label>
                    <select name="tipotraza_id" id="tipotraza_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($tt as $t)
                        <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('tipotraza_id', '<small style="color:red">:message</small>') !!}
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