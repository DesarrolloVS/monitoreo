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
            <h2>Modificar Domicilio</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-success" href="/cat_clientes/{{ $domicilio->cliente_id }}/domicilios"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Volver a Domicilios</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <form action="/cat_domicilios/{{ $domicilio->id }}" method="POST">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="calle">Calle: </label>
                        <input class="form-control" type="text" id="calle" name="calle" placeholder="Calle" value="{{ $domicilio->calle }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exterior">Número Exterior: </label>
                        <input class="form-control" type="text" id="exterior" name="exterior" placeholder="Número Exterior" value="{{ $domicilio->exterior }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="interior">Número Interior: </label>
                        <input class="form-control" type="text" id="interior" name="interior" placeholder="Numero Interior" value="{{ $domicilio->interior }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="colonia">Colonia: </label>
                        <input class="form-control" type="text" id="colonia" name="colonia" placeholder="Colonia" value="{{ $domicilio->colonia }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cp">C.P. </label>
                        <input class="form-control" type="text" id="cp" name="cp" placeholder="Colonia" value="{{ $domicilio->cp }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado: </label>
                        <input class="form-control" type="text" id="estado" name="estado" placeholder="Estado" value="{{ $domicilio->estado }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="ciiudad">Ciudad o Municipio: </label>
                        <input class="form-control" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="{{ $domicilio->ciudad }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipodomicilio_id">Tipo de Domicilio: </label>
                        <select name="tipodomicilio_id" id="tipodomicilio_id" class="form-control">
                            @foreach($tds as $td)
                            <option value="{{ $td->id }}" 
                            @if($domicilio->tipodomicilio_id == $td->id)
                            selected
                            @endif
                            >{{ $td->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <br><br>
                <button class="btn btn-primary" type="submit">Modificar</button>

            </form>
            <br>
            <br>
            <!--
            @//if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @//endif
            -->
        </div>
    </div>

</div>
@include('template.menu_catalogos')
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
@include('template.menu_catalogos')
@endsection