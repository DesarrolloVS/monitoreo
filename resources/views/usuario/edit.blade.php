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
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_usuarios/{{ $usuario->id }}" method="POST">
                        <h3 class="text-center">Modificar Usuario <small></small></h3>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" 
                                        @if($cliente->id == $usuario->cliente_id)
                                        selected
                                        @endif
                                        >{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{ $usuario->nombre }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="paterno">Paterno: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="paterno" name="paterno" placeholder="Paterno" value="{{ $usuario->paterno }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="materno">Materno: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="materno" name="materno" placeholder="Materno" value="{{ $usuario->materno }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email">Correo: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="email" name="email" placeholder="Correo" value="{{ $usuario->email }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rfc">RFC: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="rfc" name="rfc" placeholder="RFC" value="{{ $usuario->rfc }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="curp">CURP: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="curp" name="curp" placeholder="CURP" value="{{ $usuario->curp }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tipoacceso_id">Tipo de acceso: </label>
                                <select multiple name="tipoacceso_id[]" id="tipoacceso_id[]" class="form-control bg-light shadow-sm border-0">
                                    <option value="rep_legal" 
                                    @if($usuario->rep_legal == 1)
                                    selected
                                    @endif
                                    >Representante Legal</option>
                                    <option value="contacto" 
                                    @if($usuario->contacto == 1)
                                    selected
                                    @endif
                                    >Contacto</option>
                                    <option value="usuario" 
                                    @if($usuario->usuario == 1)
                                    selected
                                    @endif
                                    >Usuario</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">&ensp;</label>
                                <div class="checkbox">
                                    <label>
                                        <input id="empleado" name="empleado" type="checkbox" value="{{ $usuario->empleado }}" onclick="calc()" 
                                    @if($usuario->empleado == 1)
                                    checked
                                    @endif
                                    >&ensp;¿Es Empleado?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4" id="tipo_empleado" style="display:none">
                                <label for="tipoempleado_id">Tipo de empleado: </label>
                                <select name="tipoempleado_id" id="tipoempleado_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tes as $te)
                                        <option value="{{ $te->id }}" 
                                        @if($usuario->tipoempleado_id == $te->id)
                                        selected
                                        @endif
                                        >{{ $te->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br><br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>

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