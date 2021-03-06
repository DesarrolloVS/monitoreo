@extends('layoutbasico')

@section ('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_estadosvehiculos">Catálogo Estados Vehículos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Eliminar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col my-3">
                    <form class="bg-light rounded shadow py-3 px-4" action="/cat_estadosvehiculos/{{ $estado->id }}" method="POST">
                        <h2 class="text-center">Eliminar Registro: <small>{{ $estado->descripcion }}</small></h2>
                        <hr>
                        {{ csrf_field() }}
                        @method('delete')
                        <br>
                        <button class="btn btn-danger btn-block" type="submit"><i class="fas fa-trash-alt"></i>&ensp;Eliminar</button>
                        <a href="/cat_estadosvehiculos" class="btn btn-outline-dark btn-block"><i class="far fa-window-close"></i>&ensp;Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection