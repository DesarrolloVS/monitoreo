@extends('layoutbasico')

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
                        <li class="breadcrumb-item active" aria-current=""><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca - Modelo</a></li>
                        <li class="breadcrumb-item active" aria-current="">Alertas GPS</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Alertas GPS {{ $gps->marca }} - {{ $gps->modelo}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_alertas/{{$gps->id}}/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Alerta</a>
                </div>
            </div>
            @if($alertasmm->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Desc. Corta</th>
                                <th class="text-center">Tipo Conf. </th>
                                <th class="text-center">Campo</th>
                                <th class="text-center">Campos cond.</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Parametro</th>
                                <th class="text-center">Repetir</th>
                                <th class="text-center">Tipo Vehículo</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        @foreach($alertasmm as $x)
                        <tr>
                            <td class="text-center">{{ $x->id }}</td>
                            <td class="text-center">{{ $x->tipotraza->descripcion }}</td>
                            <td class="text-center">{{ $x->num_posiciones }}</td>
                            <!-- <td class="text-center"><a class="btn btn-info btn-xs" href="/cat_trazas/{{ $x->id }}/estatus">{{ ($x->estadotraza_id == "" ) ? "SIN ESTADO" : "CON ESTADO" }}&emsp;<i class="fas fa-exchange-alt"></i></a></td> -->
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="#">{{ ($x->estadotraza_id == "" ) ? "SIN ESTADO" : "CON ESTADO" }}&emsp;<i class="fas fa-exchange-alt"></i></a>
                            </td>
                            <td class="text-center"><a class="btn btn-warning btn-sm" href="/cat_trazas/{{ $x->id }}/posiciones"><i class="far fa-object-ungroup"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="#"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm disabled" href="#"><i class="fas fa-trash-alt"></i></a></td>
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
                        <strong>Atención: </strong> No hay registros para este GPS.
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