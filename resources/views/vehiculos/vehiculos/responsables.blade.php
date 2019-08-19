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
        <div class="text-center">
            <h2>Asignar Responsable: <small>Placa: {{ $v->placa }} </small></h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="justifyc">
            <div>
                <a class="btn btn-success" href="/cat_vehiculos"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Regresar a Catálogo Vehículos</a>
            </div>
            @if($actuales->first())
            <div>
              <a class="btn btn-primary" href="/cat_vehiculos/{{ $v->id }}/responsablesactuales"><i class="fas fa-user-check"></i>&nbsp;&nbsp;&nbsp;Responsable(s) Actual(es)</a>
            </div>
            @endif
            @if($h->first())
            <div>
              <a class="btn btn-info" href="/cat_vehiculos/{{ $v->id }}/responsablesh"><i class="fas fa-database"></i>&nbsp;&nbsp;&nbsp;Historico Responsables</a>
            </div>
            @endif
        </div>
    </div>

    <div class="row  col-md-4 col-md-offset-4"><br>
    </div>

    <div class="row">
        <div class="">
            <br><br>
            <form action="/cat_vehiculos/{{ $v->id }}/resp" method="POST">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4"><br><br>
                        <label for="cliente_id">Cliente: </label>
                        <select name="cliente_id" id="cliente_id" class="form-control" readonly>
                            <option value="{{ $cliente->id }}" selected>{{ $cliente->nombre }}</option>
                        </select>
                    </div>
                </div>

                @if($res->first())
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <label for="responsablevehiculo_id">Cambiar GPS a: </label>
                        <select name="responsablevehiculo_id" id="responsablevehiculo_id" class="form-control">
                            <option value="">Asignar Responsable</option>
                            @foreach($res as $r)
                            <option value="{{ $r->id }}">{{ $r->usuario->nombre." ".$r->usuario->paterno." ".$r->usuario->materno }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group"><br>
                        <div class="text-center" id="asignar" style="display:none"><br><br>
                            <button class="btn btn-primary" type="submit">Asignar Responsable</button>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="form-group col-md-4 col-md-offset-4">
                        <br>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Atención: </strong> No hay registros de Responsables disponibles para este vehiculo.
                        </div>
                    </div>
                </div>
                @endif
                </div>

                <input type="hidden" name="placa" id="placa" value="{{ $v->placa }}">
                <input type="hidden" name="vehiculo_id" id="vehiculo_id" value="{{ $v->id }}">
            </form>
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
<script src="{{ asset('js/vehiculos/asignarresp.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
@endsection