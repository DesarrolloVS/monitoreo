@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_tipodomicilios">Catálogo Tipo de Domicilios</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_tipodomicilios" method="POST">
                        <h2 class="text-center">Agregar Tipo de Domicilio</h2>
                        <hr>
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="descripcion">Descripción: </label>
                                <input class="form-control shadow-sm border-0 bg-light" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="">
                                {!! $errors->first('descripcion', '<small>:message </small>') !!}
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