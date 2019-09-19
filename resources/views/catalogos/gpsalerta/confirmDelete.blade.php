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
                        <li class="breadcrumb-item"><a href="/cat_gpsalerta">Catálogo GPS Alerta</a></li>
                        <li class="breadcrumb-item active" aria-current="">Eliminar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white py-2 px-2 rounded">
                        <p class="my-0">Alerta: {{ $ga->alerta }}</p>
                        <p class="my-0">Marca: {{ $ga->gpsmarcamodelo->marca }}</p>
                        <p class="my-0">Modelo: {{ $ga->gpsmarcamodelo->modelo }}</p>
                        <p class="my-0">Descripción: {{ $ga->camposgps->descripcion }}</p>
                        <p class="my-0">Condicion: " {{ $ga->condicion }} "</p>
                        <p class="my-0">Valor: {{ $ga->valor }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow py-3 px-4" action="/cat_gpsalerta/{{ $ga->id }}" method="POST">
                        <h2 class="text-center">Eliminar Registro</h2>
                        <hr>
                        {{ csrf_field() }}
                        @method('delete')
                        <br>
                        <button class="btn btn-danger btn-block" type="submit">Eliminar</button>
                        <a class="class btn btn-block btn-outline-dark" href="/cat_gpsalerta"><i class="far fa-window-close"></i>&ensp;Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection