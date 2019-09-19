@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container montse">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col ">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="">Catálogo Marcas</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center montseh2">CATÁLOGO MARCAS</h1>
                </div>
            </div>
            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_marca/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Marca</a>
                </div>
            </div>

            @if($marcas->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id Marca</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($marcas as $marca)
                        <tr>
                            <td class="text-center">{{ $marca->id }}</td>
                            <td class="text-center">{{ $marca->descripcion }}</td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_marca/{{ $marca->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_marca/{{ $marca->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row col">
            <br><br><br><br>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Atecion: </strong> No hay registros para este catálogo.
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection

