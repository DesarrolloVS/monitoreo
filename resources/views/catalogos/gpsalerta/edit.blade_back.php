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
            <h2>Modificar Registro</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-success" href="/cat_gpsalerta"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo GPS Alertas</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <form action="/cat_gpsalerta/{{ $ga->id }}" method="POST">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                        <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            @foreach($mm as $m)
                            <option value="{{ $m->id }}" 
                            @if($m->id == $ga->gpsmarcamodelo_id)
                            selected
                            @endif
                            >{{ $m->marca }} - {{ $m->modelo }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>') !!}
                    </div>
                </div>
                <!-- <div id="complement"></div> -->

                <div class="row">
                    <br><br>
                    <div class="form-group col-md-6">
                        <label for="alerta">Alerta: </label>
                        <input class="form-control" type="text" id="alerta" name="alerta" placeholder="Alerta" value="{{ $ga->alerta }}">
                        {!! $errors->first('alerta', '<small style="color:red">:message</small>') !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="descripcion">Descripción: </label>
                        <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $ga->descripcion }}">
                        {!! $errors->first('descripcion', '<small style="color:red">:message</small>') !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4" id="complement">
                        <label for="camposgps_id">Campo: </label>
                        <select name="camposgps_id" id="camposgps_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            @foreach($campos as $c)
                            <option value="{{ $c->camposgps_id }}" 
                            @if($c->camposgps_id == $campo)
                            selected
                            @endif
                            >{{ $c->camposgps->descripcion }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('camposgps_id', '<small style="color:red">:message</small>') !!}
                    </div>

                    <div class="form-group col-md-4">
                        <label for="condicion">Condicion: </label>
                        <select name="condicion" id="condicion" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            <option value="<" @if($ga->condicion == "<") selected @endif > Menor</option>
                            <option value=">" @if($ga->condicion == ">") selected @endif >Mayor</option>
                            <option value="=" @if($ga->condicion == "=") selected @endif >Igual</option>
                        </select>
                        {!! $errors->first('condicion', '<small style="color:red">:message</small>') !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="valor">Valor: </label>
                        <input class="form-control" type="text" id="valor" name="valor" placeholder="Valor" value="{{ $ga->valor }}">
                        {!! $errors->first('valor', '<small style="color:red">:message</small>') !!}
                    </div>
                </div>

                <br><br>
                <button class="btn btn-primary" type="submit">Modificar</button>

            </form>
            <br>
            <br>
        </div>
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
<script src="{{ asset('js/catalogos/alertas/complement.js') }}"></script>

<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
@endsection