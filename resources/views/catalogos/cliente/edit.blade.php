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
            <h2>Modificar Cliente <small>( {{ $cliente->id }} - {{ $cliente->nombre }} )</small></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <a class="btn btn-success" href="/cat_clientes"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Clientes</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-offset-1">
            <br><br>
            <form action="/cat_clientes/{{ $cliente->id }}" method="POST">
                @csrf
                @method('put')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre Empresa: </label>
                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre empresa" value="{{ $cliente->nombre }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo">Logo: </label>
                        <input type="file" class="form-control" name="logo">
                        @if($cliente->logo)
                        <a href="{{ asset('logos') }}/{{ $cliente->logo }}" class="btn btn-info btn-xs" target="_blank">Ver Logo</a>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="tipopersona_id">Tipo de Persona: </label>
                        <select name="tipopersona_id" id="tipopersona_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            @foreach($tps as $tp)
                                <option value="{{ $tp->id }}" 
                                @if($cliente->tipopersona_id == $tp->id) 
                                selected
                                @endif
                                >{{ $tp->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rfc">RFC: </label>
                        <input class="form-control" type="text" id="rfc" name="rfc" placeholder="RFC" value="{{ $cliente->rfc }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="tipoempresa_id">Tipo de Empresa: </label>
                        <select name="tipoempresa_id" id="tipoempresa_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            @foreach($tes as $te)
                                <option value="{{ $te->id }}" 
                                @if($cliente->tipoempresa_id == $te->id) 
                                selected
                                @endif
                                >{{ $te->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="estadocliente_id">Estado cliente: </label>
                        <select name="estadocliente_id" id="estadocliente_id" class="form-control">
                            <option value="">Seleccione una Opción</option>
                            @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" 
                            @if($cliente->estadocliente_id == $estado->id) 
                            selected
                            @endif
                            >{{ $estado->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="tiposervicio_id">Tipo de Servicio: </label>
                        <select multiple name="tiposervicio_id[]" id="tiposervicio_id[]" class="form-control">
                            @foreach($tss as $ts)
                                <option value="{{ $ts->id }}" 
                                @if(isset($services[$ts->id]))
                                selected
                                @endif
                                >{{ $ts->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="usuario_id">Contacto: </label>
                        <input type="text" placeholder="Ingrese el nombre del usuario" class="form-control">
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
@include('template.menu_clientes')
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