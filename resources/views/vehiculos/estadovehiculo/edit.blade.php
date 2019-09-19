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
                        <li class="breadcrumb-item"><a href="/cat_estadosvehiculos">Catálogo Estados Vehículos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br><br>
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_estadosvehiculos/{{ $estado->id }}" method="POST">
                        @csrf
                        @method('put')
                        <h2>Modificar Registro</h2>
                        <hr>
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripción: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $estado->descripcion }}">
                            </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-pencil-alt"></i>&ensp;Modificar</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
<!-- <script src="{{ asset('js/librerias/jquery.min.js') }}"></script> -->
@endsection