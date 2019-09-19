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
                        <li class="breadcrumb-item"><a href="/cat_tipotransmision">Catálogo Tipo de Transmisión</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-offset-1">
                    <br><br>
                    <form class="bg-white shadow py-3 px-4" action="/cat_tipotransmision/{{ $tt->id }}" method="POST">
                        <h2 class="text-center">Modificar Registro</h2>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="descripcion">Descripción: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $tt->descripcion }}">
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