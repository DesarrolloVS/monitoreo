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
                        <li class="breadcrumb-item"><a href="/cat_trazas">Catálogo Trazas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_trazas" method="POST">
                        <h2 class="text-center">Agregar Traza</h2>
                        <hr>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($mm as $m)
                                    <option value="{{ $m->id }}">{{ $m->marca }} - {{ $m->modelo }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">
                        <br><br>
                            <div class="form-group col-md-4">
                                <label for="descripcion">Traza: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                                {!! $errors->first('descripcion', '<small style="color:red">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="descripcion">Número de Posiones: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="num_posiciones" name="num_posiciones" placeholder="Número de Posiciones" value="{{ old('num_posiciones') }}">
                                {!! $errors->first('num_posiciones', '<small style="color:red">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipotraza_id">Tipo Traza: </label>
                                <select name="tipotraza_id" id="tipotraza_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tt as $t)
                                    <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipotraza_id', '<small style="color:red">:message</small>') !!}
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