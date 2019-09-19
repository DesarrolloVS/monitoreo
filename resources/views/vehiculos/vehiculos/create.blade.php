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
                        </div>
                        <div class="form-group col-md-3">
                            <label for="marca_id">Marca: </label>
                            <select name="marca_id" id="marca_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($marcas as $m)
                                <option value="{{ $m->id }}">{{ $m->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="submarca" style="" class="form-group col-md-3">
                            <label for="submarca_id">Submarca: </label>
                            <select name="submarca_id" id="submarca_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="placa">Placa: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="placa" name="placa" placeholder="Placa" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modelo_id">Modelo: </label>
                            <select name="modelo_id" id="modelo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($modelos as $modelo)
                                <option value="{{ $modelo->id }}">{{ $modelo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="puertas">Puertas: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="puertas" name="puertas" placeholder="Puertas" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cilindros">Cilindros: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="cilindros" name="cilindros" placeholder="Cilindros" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="serie">Serie: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="chasis">Chasis: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="chasis" name="chasis" placeholder="Chasis" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="capacidad">Capacidad de Carga: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="capacidad" name="capacidad" placeholder="Capacidad" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="procedencia_id">Procedencia: </label>
                            <select name="procedencia_id" id="procedencia_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($procedencias as $procedencia)
                                <option value="{{ $procedencia->id }}">{{ $procedencia->descripcion }}</option>
                                @endforeach
                            </select>
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
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tipouso_id">Tipo de usos: </label>
                            <select name="tipouso_id" id="tipouso_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($tus as $tu)
                                <option value="{{ $tu->id }}">{{ $tu->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tipocombustible_id">Tipo de Combustible: </label>
                            <select name="tipocombustible_id" id="tipocombustible_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($tcs as $tc)
                                <option value="{{ $tc->id }}">{{ $tc->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transmision_id">Tipo de Transmision: </label>
                            <select name="tipotransmision_id" id="tipotransmision_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($tts as $tt)
                                <option value="{{ $tt->id }}">{{ $tt->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="version">Version: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="version" name="version" placeholder="Versión" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="clasevehiculo_id">Clase de Vehículo: </label>
                            <select name="clasevehiculo_id" id="clasevehiculo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($cvs as $cv)
                                <option value="{{ $cv->id }}">{{ $cv->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="vin">VIN: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="vin" name="vin" placeholder="VIN" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rfv">RFV: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="rfv" name="rfv" placeholder="RFV" value="">
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="color">Color: </label>
                            <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="color" name="color" placeholder="Color" value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="balizado">Balizado: </label>
                            <select name="balizado" id="balizado" class="form-control form-control-sm bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
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