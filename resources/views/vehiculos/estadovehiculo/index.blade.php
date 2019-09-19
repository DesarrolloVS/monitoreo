@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col ">
            <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="">Catálogo Estados Vehículos</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <h2 class="text-center montseh2">CATÁLOGO ESTADOS VEHICULOS</h1>
        </div>
    </div>

    <div class="row">
        <div class="col my-3">
            <br><br>
            <a class="btn btn-primary" href="/cat_estadosvehiculos/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Estado Vehículo</a>
        </div>
    </div>

    @if($estados->first())
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Descripcion</th>
                        <th class="text-center">Modificar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
                
                @foreach($estados as $e)
                <tr>
                    <td class="text-center">{{ $e->id }}</td>
                    <td class="text-center">{{ $e->descripcion }}</td>
                    <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_estadosvehiculos/{{ $e->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                    <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_estadosvehiculos/{{ $e->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @else
    <div class="row col-md-10 col-offset-1">
    <br><br><br><br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Atención: </strong> No hay registros para este catálogo.
    </div>
    </div>
    @endif


    

</div>
@endsection

@section ('scripts')
<!-- <script src="{{ asset('js/librerias/jquery.min.js') }}"></script> -->
@endsection