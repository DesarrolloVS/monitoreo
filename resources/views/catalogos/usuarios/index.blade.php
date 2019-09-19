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
                        <li class="breadcrumb-item active" aria-current="">Catálogo Usuarios</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center montseh2">CATÁLOGO USUARIOS</h1>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_usuarios/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Usuario</a>
                </div>
            </div>

            @if($usuarios->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-condensed table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Perfiles</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($usuarios as $u)
                        <tr>
                            <td class="text-center">{{ $u->id }}</td>
                            <td class="text-center">{{ str_limit(($u->nombre." ".$u->paterno." ".$u->materno),30) }} </td>
                            <td class="text-center">{{ str_limit($u->cliente->nombre,30) }}</td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_usuarios/{{ $u->id }}/estatus">{{ ($u->estadousuario_id == "" ) ? estatus_cliente($u->estadousuario_id) : $u->estadousuario_id }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <!-- <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_usuarios/{{ $u->id }}/perfiles"><i class="far fa-id-card"></i></a></td> -->
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="#"><i class="far fa-id-card"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_usuarios/{{ $u->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_usuarios/{{ $u->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
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