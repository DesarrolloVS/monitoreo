@extends('layoutbasico')

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
                        <li class="breadcrumb-item"><a href="/cat_trazas">Trazas GPS</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Traza: {{ $mm->marca}} : {{ $mm->modelo}}</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_trazas" method="POST">
                        <input type="hidden" name="id_gps" id="id_gps" value="{{ $mm->id }}">
                        <h2 class="text-center">Agregar Traza</h2>
                        <hr>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="gpsmarcamodelo_id">Marca - Modelo: </label><br>
                                <label for="gpsmarcamodelo_id">{{ $mm->marca}} : {{ $mm->modelo}} </label>
                            </div>
                        </div>

                        <div class="row">
                        <br><br>
                            <div class="form-group col-md-4">
                                <label for="descripcion">Traza: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                                {!! $errors->first('descripcion', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="descripcion">Número de Posiciones: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="num_posiciones" name="num_posiciones" placeholder="Número de Posiciones" value="{{ old('num_posiciones') }}">
                                {!! $errors->first('num_posiciones', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipotraza_id">Tipo Traza: </label>
                                <select name="tipotraza_id" id="tipotraza_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tt as $t)
                                    <option value="{{ $t->id }}">{{ $t->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipotraza_id', '<span class="badge badge-danger">:message </span>') !!}
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