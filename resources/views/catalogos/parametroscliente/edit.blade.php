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
                        <li class="breadcrumb-item"><a href="/cat_parametroscliente">Catálogo Parametros Cliente</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_parametroscliente/{{ $pc->id }}" method="POST">
                        <h3 class="text-center">Modificar Registro</h3>
                        <hr>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                </select>
                                {!! $errors->first('cliente_id', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row"><br><br>
                            <div class="form-group col-md-4">
                                <label for="parametro">Parametro: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="parametro" name="parametro" placeholder="Parametro" value="{{ $pc->parametro }}">
                                {!! $errors->first('parametro', '<small style="color:red">:message</small>') !!}
                            </div>

                            <div class="form-group col-md-4">
                                <label for="descripcion">Descripcion: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripcion" value="{{ $pc->descripcion }}">
                                {!! $errors->first('descripcion', '<small style="color:red">:message</small>') !!}
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor">Valor: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="valor" name="valor" placeholder="Valor" value="{{ $pc->valor }}">
                                {!! $errors->first('valor', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
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