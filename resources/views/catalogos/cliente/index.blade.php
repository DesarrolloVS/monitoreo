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
                        <li class="breadcrumb-item active" aria-current="">Catálogo Clientes</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">CATÁLOGO CLIENTES</h1>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <a class="btn btn-primary" href="/cat_clientes/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Cliente</a>
                </div>
            </div>

            @if($clientes->first())
            <div class="row">                
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">RFC</th>
                                <th class="text-center">Contacto</th>
                                <th class="text-center">Estatus</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Domicilio</th>
                                <th class="text-center">Modificar</th>
                            </tr>
                        </thead>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td class="text-center">{{ $cliente->id }}</td>
                            <td class="text-center">{{ $cliente->nombre }}</td>
                            <td class="text-center">{{ $cliente->rfc }}</td>
                            <td class="text-center">{{ $cliente->usuario_id }}</td>
                            <td class="text-center"><a href="/cat_clientes/{{ $cliente->id }}/estatus" class="btn btn-warning btn-sm">{{ $cliente->estadocliente_id }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center">
                                @if($cliente->logo)
                                <a href="{{ asset('logos/') }}/{{ $cliente->logo }}" target="_blank" class="btn btn-info btn-sm">Ver Logo</a>
                                @endif
                            </td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_clientes/{{ $cliente->id }}/domicilios">Domicilios</a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_clientes/{{ $cliente->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <!--
                            <td class="text-center"><a class="btn btn-danger btn-xs" href="/cat_clientes/{{ $cliente->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                            -->
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
                        <strong>Atecion: </strong> No hay registros para este catálogo.
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