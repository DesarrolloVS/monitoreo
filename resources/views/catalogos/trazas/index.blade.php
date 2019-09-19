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
                        <li class="breadcrumb-item active" aria-current="">Catálogo Trazas</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">CATÁLOGO TRAZAS</h1>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_trazas/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Registro</a>
                </div>
            </div>

            @if($trazas->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Tipo Traza</th>
                                <th class="text-center"># Posiciones</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Traza Posición</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($trazas as $x)
                        <tr>
                            <td class="text-center">{{ $x->id }}</td>
                            <td class="text-center">{{ $x->gpsmarcamodelo->marca }}</td>
                            <td class="text-center">{{ $x->gpsmarcamodelo->modelo }}</td>
                            <td class="text-center">{{ $x->tipotraza->descripcion }}</td>
                            <td class="text-center">{{ $x->num_posiciones }}</td>
                            <!-- <td class="text-center"><a class="btn btn-info btn-xs" href="/cat_trazas/{{ $x->id }}/estatus">{{ ($x->estadotraza_id == "" ) ? "SIN ESTADO" : "CON ESTADO" }}&emsp;<i class="fas fa-exchange-alt"></i></a></td> -->
                            <td class="text-center"><a class="btn btn-info btn-sm" href="#">{{ ($x->estadotraza_id == "" ) ? "SIN ESTADO" : "CON ESTADO" }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-warning btn-sm" href="/cat_trazas/{{ $x->id }}/posiciones"><i class="far fa-object-ungroup"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="#"><i class="fas fa-pencil-alt"></i></a></td>                    
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="#"><i class="fas fa-trash-alt"></i></a></td>
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