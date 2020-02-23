@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_vehiculos">Catálogo Vehículos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos" method="POST">
                    <h2 class="text-center">Agregar Vehículo</h2>
                    <hr>
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cliente_id">Cliente: </label>
                            <select name="cliente_id" id="cliente_id" class="form-control form-control-sm bg-light shadow-sm border-0">
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="descripcion">Descripcion Vehículo: </label>
                            <input class="form-control form-control-sm bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="">
                           {!! $errors->first('descripcion', '<small>:message </small>') !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="placa">Placa: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="placa" name="placa" placeholder="Placa" value="">
                           {!! $errors->first('placa', '<small>:message </small>') !!}
                        </div>
                        <div class="form-group col-md-3">
                            <label for="placa">Modelo: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="modelo" name="modelo" placeholder="Placa" value="">
                           {!! $errors->first('Modelo', '<small>:message </small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="tipovehiculo_id">Tipo de Vehículo: </label>
                            <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($tvs as $tv)
                                <option value="{{ $tv->id }}">{{ $tv->descripcion }}</option>
                                @endforeach
                            </select>
                           {!! $errors->first('tipovehiculo_id', '<small>:message </small>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="placa">Marca: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="marca" name="marca" placeholder="Marca" value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="placa">Submarca: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="submarca" name="submarca" placeholder="Submarca" value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="serie">Serie: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="color">Color: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="color" name="color" placeholder="Color" value="">
                        </div>
                    </div>


                    <br>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
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
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/usuario/vehiculo.js') }}"></script>
@endsection