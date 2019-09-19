@extends('layout')

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
                        <li class="breadcrumb-item"><a href="/cat_vehiculos">Catálogo Vehículos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Estatus</li>
                    </ol>
                </div>
            </div>

            <div class="row"><br><br>
                <div class="col">
                    <h3>Estatus Actual: {{ ($v->estadovehiculo_id == "" ) ? estatus_vehiculos($v->estadovehiculo_id) : $v->estadovehiculo->descripcion }}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos/{{ $v->id }}/estatus" method="POST">
                        <h4 class="text-center">Modificar Estatus Vehiculo: <small>{{ $v->placa }} </small></h4>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="estadogpscliente_id">Cambiar Estado a: </label>
                                <select name="estadovehiculo_id" id="estadovehiculo_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($estados as $estado)
                                    @if($estado->id != $v->estadovehiculo_id)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <br>
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