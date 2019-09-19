@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_vehiculos">Catálogo Vehículos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Historico GPS</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col py-3">
                    <h3>Histórico: <small>Placa: {{ $v->placa }} </small></h3>
                    <h3 class="">Gps Actual: {{ ($v->gpscliente_id == "" ) ? "NO ASIGNADO" : $v->gpscliente->imei }}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Imei</th>
                                <th class="text-center">Serie GPS</th>
                                <th class="text-center">Placa</th>
                                <th class="text-center">Fecha de asignacion</th>
                            </tr>
                        </thead>
                        
                        @foreach($historico as $h)
                        <tr>
                            <td class="text-center">{{ $h->id }}</td>
                            <td class="text-center">{{ $h->imei }}</td>
                            <td class="text-center">{{ $h->serie }}</td>
                            <td class="text-center">{{ $h->placa }}</td>
                            <td class="text-center">{{ $h->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section ('scripts')
@endsection