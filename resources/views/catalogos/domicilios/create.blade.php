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
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente->id }}/domicilios">Domicilios</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">Agregar Domicilio - <small>{{ $cliente->nombre }}</small> </h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/domicilios/{{ $cliente->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="calle">Calle: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="calle" name="calle" placeholder="Calle" value="">
                                {!! $errors->first('calle', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exterior">Número Exterior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="exterior" name="exterior" placeholder="Número Exterior" value="">
                                {!! $errors->first('exterior', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="interior">Número Interior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="interior" name="interior" placeholder="Numero Interior" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="colonia">Colonia: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="colonia" name="colonia" placeholder="Colonia" value="">
                                {!! $errors->first('colonia', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cp">C.P. </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="cp" name="cp" placeholder="Colonia" value="">
                                {!! $errors->first('cp', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado">Estado: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="estado" name="estado" placeholder="Estado" value="">
                                {!! $errors->first('estado', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ciiudad">Ciudad o Municipio: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="">
                                {!! $errors->first('ciudad', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipodomicilio_id">Tipo de Domicilio: </label>
                                <select name="tipodomicilio_id" id="tipodomicilio_id" class="form-control form-control-sm shadow-sm border-0 bg-light">
                                    @foreach($tds as $td)
                                        <option value="{{ $td->id }}">{{ $td->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipodomicilio_id', '<span class="badge badge-danger">:message</span>') !!}
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