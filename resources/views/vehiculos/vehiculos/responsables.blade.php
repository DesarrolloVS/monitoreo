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
                        <li class="breadcrumb-item active" aria-current="">Asignar Responsable</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos/{{ $v->id }}/resp" method="POST">
                        <h2 class="text-center">Asignar Responsable: <small>{{ $v->placa }} </small></h2>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control" readonly>
                                    <option value="{{ $cliente->id }}" selected>{{ $cliente->nombre }}</option>
                                </select>
                            </div>
                        </div>

                        @if($res->first())
                        <div class="row">
                            <div class="form-group col">
                                <label for="responsablevehiculo_id">Cambiar GPS a: </label>
                                <select name="responsablevehiculo_id" id="responsablevehiculo_id" class="form-control">
                                    <option value="">Asignar Responsable</option>
                                    @foreach($res as $r)
                                    <option value="{{ $r->id }}">{{ $r->usuario->nombre." ".$r->usuario->paterno." ".$r->usuario->materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><br>
                                <div class="" id="asignar" style="display:none">
                                    <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i>&nbsp;Asignar Responsable</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col">
                                <br>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Atención: </strong> No hay registros de Responsables disponibles para este vehiculo.
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- </div> -->

                        <input type="hidden" name="placa" id="placa" value="{{ $v->placa }}">
                        <input type="hidden" name="vehiculo_id" id="vehiculo_id" value="{{ $v->id }}">
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col py-3">
                    <div class="bg-white shadow py-3 px-4 rounded">
                        @if($actuales->first())
                        <div class="py-2">
                            <a class="btn btn-success btn-block" href="/cat_vehiculos/{{ $v->id }}/responsablesactuales"><i class="fas fa-user-check"></i>&nbsp;&nbsp;&nbsp;Responsable(s) Actual(es)</a>
                        </div>
                        @endif
                        @if($h->first())
                        <div>
                            <a class="btn btn-outline-success btn-block" href="/cat_vehiculos/{{ $v->id }}/responsablesh"><i class="fas fa-database"></i>&nbsp;&nbsp;&nbsp;Historico Responsables</a>
                        </div>
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
<script src="{{ asset('js/vehiculos/asignarresp.js') }}"></script>
@endsection