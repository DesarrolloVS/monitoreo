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
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_respveh/{{ $r->id }}" method="POST">
                        <h4 class="text-center">Modificar Responsable: <small>( {{ $r->usuario->nombre." ".$r->usuario->paterno." ".$r->usuario->materno }} )</small></h4>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" 
                                    @if($cliente->id == $r->cliente_id)
                                    selected
                                    @endif
                                    >{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4" id="usuarios">
                                <label for="usuario_id">Usuarios: </label>
                                <select name="usuario_id" id="usuario_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($us as $u)
                                    <option value="{{ $u->id }}" 
                                    @if($u->id == $r->usuario_id)
                                    selected
                                    @endif
                                    >{{ $u->nombre." ".$u->paterno." ".$u->materno }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group col-md-4" id="turnos">
                                <label for="turno_id">Turnos: </label>
                                <select name="turno_id" id="turno_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($turnos as $t)
                                    <option value="{{ $t->id }}" 
                                    @if($t->id == $r->turno_id)
                                    selected
                                    @endif
                                    >{{ $t->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
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
<script src="{{ asset('js/usuario/responsables.js') }}"></script>
@endsection