@extends('layoutbasico')

@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_gpsalerta">Catálogo GPS alerta</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Estatus</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white py-2 px-2 rounded">
                        <!-- <p class="my-0">Modificar Estatus Gps Alerta: </p> -->
                        <p class="my-0">Alerta: {{ $ga->alerta }}</p>
                        <p class="my-0">Marca: {{ $ga->gpsmarcamodelo->marca }}</p>
                        <p class="my-0">Modelo: {{ $ga->gpsmarcamodelo->modelo }}</p>
                        <!-- <p class="my-0">Descripción: {{ $ga->camposgps->descripcion }}</p> -->
                        <p class="my-0">Condicion: " {{ $ga->condicion }} "</p>
                        <p class="my-0">Valor: {{ $ga->valor }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_gpsalerta/{{ $ga->id }}/estatus" method="POST">
                        <h3 class="text-center">Estatus Actual: {{ ($ga->estado == false ) ? "INACTIVO" : "ACTIVO" }}</h3>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="estado">Cambiar Estado a: </label>
                                    <select name="estado" id="estado" class="form-control bg-light shadow-sm border-0">
                                        @if($ga->estado == true)
                                        <option value="0">Inactivo</option>
                                        @endif
                                        @if($ga->estado == false)
                                        <option value="1">Activo</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection