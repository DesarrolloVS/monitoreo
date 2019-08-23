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
            <h2>Administrar Posiciones</h2>
        </div>
    </div>

    <div class="row">
        <br><br>
        <div class="justifyc">
            <div>
                <a class="btn btn-success" href="/cat_trazas"><i class="fas fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;Catálogo Trazas</a>
            </div>
        </div>
    </div>

    <div class="row"><br><br>
        <div class="">
            <p>Marca: {{ $t->gpsmarcamodelo->marca }}</p>
            <p>Modelo: {{ $t->gpsmarcamodelo->modelo }}</p>
            <p>Tipo Traza: {{ $t->tipotraza->descripcion }}</p>
        </div>
    </div>

    <form action="/cat_posiciones/{{ $t->id }}" method="POST">
        @csrf
        <div class="row"><br>
            <div class="form-group col-md-4">
                <label for="posicion">Posicion: </label>
                <select name="posicion" id="posicion" class="form-control">
                    <option value="">Seleccione una Opción</option>
                    @foreach($posiciones as $p)
                    <option value="{{ $p }}">Posicion {{ $p }}</option>
                    @endforeach
                </select>
                {!! $errors->first('posicion', '<small style="color:red">:message</small>') !!}
            </div>
            <div class="form-group col-md-4">
                <label for="camposgps_id">Campos GPS: </label>
                <select name="camposgps_id" id="camposgps_id" class="form-control">
                    <option value="">Seleccione una Opción</option>
                    @foreach($campos as $c)
                    <option value="{{ $c->id }}">{{ $c->descripcion }}</option>
                    @endforeach
                </select>
                {!! $errors->first('camposgps_id', '<small style="color:red">:message</small>') !!}
            </div>
        </div>

        <br><br>
            <div class="text-center">
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
            </div>
    </form>



    @if($ps->first())
    <div class="row">
        <br><br>
        <div class="">
            <table class="table table-bordered table-condensed">
                <th class="text-center">Id</th>
                <th class="text-center">Posicion</th>
                <th class="text-center">Campo</th>
                <th class="text-center">Eliminar</th>
                @foreach($ps as $x)
                <tr>
                    <td class="text-center">{{ $x->id }}</td>
                    <td class="text-center">{{ $x->posicion }}</td>
                    <td class="text-center">{{ $x->camposgps->descripcion }}</td>
                    <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_trazas/{{ $x->id }}/confirmDeletePosicion"><i class="fas fa-trash-alt"></i></a></td>
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
        <strong>Atención: </strong> No hay registros de posiciones para esta traza.
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
<script src="{{ asset('js/catalogos/gps/posiciones.js') }}"></script>

<script src="{{ asset('js/librerias/pushbar.js') }}"></script>
<script>
    var pushbar = new Pushbar({
        blur: true,
        overlay: true
    });
</script>
@include('template.menu_catalogos')
@endsection