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
                        <li class="breadcrumb-item active" aria-current="">Asignar GPS</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white shadow py-3 px-4 rounded">
                        <h3>Gps Actual: {{ ($v->gpscliente_id == "" ) ? "NO ASIGNADO" : $v->gpscliente->imei }}
                        @if($v->gpscliente_id != "")
                        <h3>Fecha de Asignación: {{ $v->gpscliente->created_at }}</h3>
                        @endif
                            @if($v->gpscliente_id != "")
                            &emsp;<a href="/cat_vehiculos/{{ $v->id }}/nogps" class="btn btn-danger btn-block btn-xs"><i class="fas fa-trash-alt"></i>&ensp;Desvincular GPS</a>
                            @endif
                        </h3>
                    </div>

                </div>
                
            </div>
            <hr>
            

            <div class="row">
                <div class="col">
                    
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos/{{ $v->id }}/gps" method="POST">
                        <h2 class="text-center">Asignar Gps Vehiculo: <small>{{ $v->placa }} </small></h2>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0" readonly>
                                    <option value="{{ $cliente->id }}" selected>{{ $cliente->nombre }}</option>
                                </select>
                            </div>
                        </div>

                        @if($gpss->first())
                            <div class="row">
                                <div class="form-group col">
                                    <label for="gpscliente_id">Cambiar GPS a: </label>
                                    <select name="gpscliente_id" id="gpscliente_id" class="form-control bg-light shadow-sm border-0">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($gpss as $g)
                                        <option value="{{ $g->id }}">{{ $g->serie }} - {{ $g->imei }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-center" id="asignar" style="display:none"><br>
                                        <button class="btn btn-primary btn-block" type="submit">Asignar Gps</button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group col">
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Atención: </strong> No hay registros de GPS's disponibles para este cliente.
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- </div> -->

                        <input type="hidden" name="placa" id="placa" value="{{ $v->placa }}">
                        <input type="hidden" name="vehiculo_id" id="vehiculo_id" value="{{ $v->id }}">
                        <input type="hidden" name="gpscliente_id_anterior" id="gpscliente_id_anterior" value="{{ $v->gpscliente_id }}">
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="bg-white shadow py-3 px-4 rounded">
                        @if($historico->first())
                        <a class="btn btn-info btn-block" href="/cat_vehiculos/{{ $v->id }}/historico"><i class="fas fa-database"></i>&nbsp;&nbsp;&nbsp;Historico GPS</a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/usuario/asignargps.js') }}"></script>
@endsection