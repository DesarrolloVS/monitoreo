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
                        <li class="breadcrumb-item"><a href="/cat_vehiculos/{{ $v->id }}/resp">Asignar Responsable</a></li>
                        <li class="breadcrumb-item active" aria-current="">Responsables Actuales</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col py-3">
                    <h2>Responsables Actuales Vehículo: <small>{{ $v->placa }} </small></h2>
                </div>
            </div>

            @if($res->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Placa</th>
                                <th class="text-center">Responsable</th>
                                <th class="text-center">Fecha de asignacion</th>
                                <th class="text-center">Eliminar Responsable</th>
                            </tr>
                        </thead>

                        @foreach($res as $h)
                        <tr>
                            <td class="text-center">{{ $h->id }}</td>
                            <td class="text-center">{{ $v->placa }}</td>
                            <td class="text-center">{{ str_limit($h->usuario->nombre." ".$h->usuario->paterno." ".$h->usuario->materno,30) }}</td>
                            <td class="text-center">{{ $h->created_at }}</td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_vehiculos/{{ $h->id }}/deleteResponsable"><i class="fas fa-trash-alt"></i></a></td>
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
                        <strong>Atención: </strong> No hay registros de Responsables para este Vehículo.
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