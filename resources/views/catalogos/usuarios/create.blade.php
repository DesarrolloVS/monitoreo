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
                        <li class="breadcrumb-item"><a href="/cat_usuarios">Catálogo Usuarios</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Usuario</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_usuarios" method="POST">
                        <h3 class="text-center">Agregar Usuario</h3>
                        <hr>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="datos_usuario" style="display:none">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nombre">Nombre: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="nombre" name="nombre" placeholder="Nombre" value="">
                                    {!! $errors->first('nombre', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="paterno">Paterno: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="paterno" name="paterno" placeholder="Paterno" value="">
                                    {!! $errors->first('paterno', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="materno">Materno: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="materno" name="materno" placeholder="Materno" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email">Correo: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="email" name="email" placeholder="Correo" value="">
                                    {!! $errors->first('email', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rfc">RFC: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="rfc" name="rfc" placeholder="RFC" value="">
                                    {!! $errors->first('rfc', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="curp">CURP: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="curp" name="curp" placeholder="CURP" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="tipoacceso_id">Tipo de acceso: </label>
                                    <select multiple name="tipoacceso_id[]" id="tipoacceso_id[]" class="form-control bg-light shadow-sm border-0">
                                        <option value="rep_legal">Representante Legal</option>
                                        <option value="contacto">Contacto</option>
                                        <option value="usuario">Usuario</option>
                                    </select>
                                    {!! $errors->first('tipoacceso_id', '<span class="badge badge-danger">:message</span>') !!}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">&ensp;</label>
                                    <div class="checkbox" class="my-2">
                                        <label>
                                            <input id="empleado" name="empleado" type="checkbox" value="" onclick="calc()"> &ensp; ¿Es Empleado?
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-md-4" id="tipo_empleado" style="display:none">
                                </div>
                            </div>
                            <br>
                            <div class="text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
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
<script src="{{ asset('js/usuario/usuario.js') }}"></script>
@endsection