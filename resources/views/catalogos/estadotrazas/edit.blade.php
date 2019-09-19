@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-8 col-sm-8 col-md-8 col-lg-8 mx-auto">    

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_estadotrazas">Catálogo Estados Trazas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_estadotrazas/{{ $et->id }}" method="POST">
                        <h2 class="text-center">Modificar Registro</h2>
                        <hr>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col">
                                <label for="descripcion">Traza: </label>
                                <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $et->descripcion }}">
                                {!! $errors->first('descripcion', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection