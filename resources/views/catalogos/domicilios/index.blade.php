@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="">Domicilios</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">DOMICILIOS - {{ $cliente->nombre }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_domicilios/{{ $cliente->id }}/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Domicilio</a>
                </div>
            </div>

            @if($domicilios->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Ciudad</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Tipo Domicilio</th>
                                <th class="text-center">Modificar</th>
                                <!-- <th class="text-center">Eliminar</th> -->
                            </tr>
                        </thead>
                        @foreach($domicilios as $d)
                        <tr>
                            <td class="text-center">{{ $d->id }}</td>
                            <td class="text-center">{{ $d->calle }}, {{ $d->exterior }}@if($d->interior), {{ $d->interior }}@endif, {{ $d->colonia }}, {{ $d->cp }}</td>
                            <td class="text-center">{{ $d->ciudad }}</td>
                            <td class="text-center">{{ $d->estado }}</td>
                            <td class="text-center">{{ $d->tipodomicilio_id }}</td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_domicilios/{{ $d->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <!-- <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_tiposervicios/{{ $d->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td> -->
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