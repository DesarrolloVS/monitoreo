@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container">

    <div class="row">   
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_clientes" method="POST" enctype="multipart/form-data">
                        <h3 class="text-center">Agregar Cliente</h3>
                        <hr>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre Empresa: </label>
                                <input class="form-control shadow-sm border-0 bg-light" type="text" id="nombre" name="nombre" placeholder="Nombre empresa" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="logo">Logo: </label>
                                <input type="file" class="form-control shadow-sm border-0 bg-light" name="logo">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tipopersona_id">Tipo de Persona: </label>
                                <select name="tipopersona_id" id="tipopersona_id" class="form-control shadow-sm border-0 bg-light">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tps as $tp)
                                        <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rfc">RFC: </label>
                                <input class="form-control shadow-sm border-0 bg-light" type="text" id="rfc" name="rfc" placeholder="RFC" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tipoempresa_id">Tipo de Empresa: </label>
                                <select name="tipoempresa_id" id="tipoempresa_id" class="form-control shadow-sm border-0 bg-light">
                                <option value="">Seleccione una Opción</option>
                                    @foreach($tes as $te)
                                        <option value="{{ $te->id }}">{{ $te->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="estadocliente_id">Estado cliente: </label>
                                <select name="estadocliente_id" id="estadocliente_id" class="form-control shadow-sm border-0 bg-light">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="tiposervicio_id">Tipo de Servicio: </label>
                                <select multiple name="tiposervicio_id[]" id="tiposervicio_id[]" class="form-control shadow-sm border-0 bg-light">
                                    @foreach($tss as $ts)
                                        <option value="{{ $ts->id }}">{{ $ts->descripcion }}</option>
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
@endsection