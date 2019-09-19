@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">    

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_vehiculos">Catálogo Vehículos</a></li>
                        <li class="breadcrumb-item"><a href="/cat_vehiculos/{{ $v->id }}/resp">Asignar Responsable</a></li>
                        <li class="breadcrumb-item"><a href="/cat_vehiculos/{{ $v->id }}/responsablesactuales">Responsables Actuales</a></li>
                        <li class="breadcrumb-item active" aria-current="">Desvincular Responsable</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos/deleteResponsable/{{ $r->id }}" method="POST">
                        <h3>Desvincular Responsable Vehículo: <small>{{ $v->placa }}</small></h3>
                        <h3>Responsable: <small> {{ $r->usuario->nombre }} {{ $r->usuario->paterno }} {{ $r->usuario->materno }}</small></h3>
                        <hr>
                        {{ csrf_field() }}
                        @method('delete')
                        <br>
                        <button class="btn btn-danger btn-block" type="submit"><i class="fas fa-trash-alt"></i>&ensp;Desvincular</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection

@section ('scripts')
@endsection