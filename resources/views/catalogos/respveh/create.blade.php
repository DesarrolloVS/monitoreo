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
                        <li class="breadcrumb-item"><a href="/cat_respveh">Catálogo Responsables de Vehículo</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_respveh" method="POST">
                        <h2 class="text-center">Agregar Responsable de Vehículo</h2>
                        <hr>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4" id="usuarios" style="display:none">
                            </div>

                            <div class="form-group col-md-4" id="turnos" style="display:none">
                                <label for="turno_id">Turnos: </label>
                                <select name="turno_id" id="turno_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($turnos as $t)
                                    <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
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
<script src="{{ asset('js/usuario/responsables.js') }}"></script>
@endsection