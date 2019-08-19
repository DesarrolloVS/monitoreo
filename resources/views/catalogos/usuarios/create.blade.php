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
            <h2 montseh2>Agregar Usuario</h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="">
            <a class="btn btn-success" href="/cat_usuarios"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Usuarios</a>
        </div>
    </div>

    <div class="row">
        <br><br>

        <form action="/cat_usuarios" method="POST">
            @csrf

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cliente_id">Cliente: </label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                        <option value="">Seleccione una Opción</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="datos_usuario" style="display:none">

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre: </label>
                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="paterno">Paterno: </label>
                        <input class="form-control" type="text" id="paterno" name="paterno" placeholder="Paterno" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="materno">Materno: </label>
                        <input class="form-control" type="text" id="materno" name="materno" placeholder="Materno" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="email">Correo: </label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="Correo" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rfc">RFC: </label>
                        <input class="form-control" type="text" id="rfc" name="rfc" placeholder="RFC" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="curp">CURP: </label>
                        <input class="form-control" type="text" id="curp" name="curp" placeholder="CURP" value="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tipoacceso_id">Tipo de acceso: </label>
                        <select multiple name="tipoacceso_id[]" id="tipoacceso_id[]" class="form-control">
                            <option value="rep_legal">Representante Legal</option>
                            <option value="contacto">Contacto</option>
                            <option value="usuario">Usuario</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="checkbox">
                            <label><input id="empleado" name="empleado" type="checkbox" value="" onclick="calc()">¿Es Empleado?
                        </div>
                    </div>
                    <div class="form-group col-md-4" id="tipo_empleado" style="display:none">
                    </div>
                </div>


                <br><br>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                </div>

            </div>
        </form>
        <br>

    </div>

</div>
@include('template.menu_usuarios')
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/librerias/bootstrap.min.js') }}"></script>
<!-- JS NOTIFICACIONES ANIMATE -->
<script type="text/javascript" src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script src="{{ asset('js/usuario/usuario.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
@endsection