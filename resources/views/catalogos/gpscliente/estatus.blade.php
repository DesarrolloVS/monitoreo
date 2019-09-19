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
                        <li class="breadcrumb-item"><a href="/cat_gpscliente">Catálogo GPS Cliente</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Estatus</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    
                </div>
            </div>

            <div class="row"><br><br>
                <div class="col-md-10 col-offset-1">
                    <h3>Estatus Actual: {{ ($gps->estadogpscliente_id == "" ) ? estatus_cliente($gps->estadogpscliente_id) : $gps->estadogpscliente->descripcion }}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpscliente/{{ $gps->id }}/estatus" method="POST">
                        <h4 class="text-center">Modificar Estatus GPS Cliente ( <small>Serie: {{ $gps->serie }}, Imei: {{ $gps->imei }} </small> )</h4>
                        <hr>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col">
                                <label for="estadogpscliente_id">Cambiar Estado a: </label>
                                <select name="estadogpscliente_id" id="estadogpscliente_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($estados as $estado)
                                    @if($estado->id != $gps->estadogpscliente_id)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section ('scripts')
@endsection