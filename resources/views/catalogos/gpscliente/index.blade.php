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
                        <li class="breadcrumb-item active" aria-current="">Catálogo GPS Clientes</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">CATÁLOGO GPS CLIENTE</h2>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_gpscliente/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar GPS Cliente</a>
                </div>
            </div>

            @if($gps->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Serie</th>
                                <th class="text-center">Imei</th>
                                <th class="text-center">Marca Modelo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($gps as $g)
                        <tr>
                            <td class="text-center">{{ $g->id }}</td>
                            <td class="text-center">{{ str_limit($g->cliente->nombre,30) }} </td>
                            <td class="text-center">{{ $g->serie }}</td>
                            <td class="text-center">{{ $g->imei }}</td>
                            <td class="text-center">{{ $g->gpsmarcamodelo->marca}} / {{ $g->gpsmarcamodelo->modelo}}</td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpscliente/{{ $g->id }}/estatus">{{ ($g->estadogpscliente_id == "" ) ? estatus_gps($g->estadogpscliente_id) : $g->estadogpscliente->descripcion }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpscliente/{{ $g->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_gpscliente/{{ $g->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                    <br><br>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atención: </strong> No hay registros para este catálogo.
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection