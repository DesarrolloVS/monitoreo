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
                        <li class="breadcrumb-item"><a href="/cat_submarca">Catálogo Submarcas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                <form class="bg-white shadow py-3 px-4" action="/cat_submarca" method="POST">
                    @csrf
                    <h2 montseh2 class="text-center">Agregar Submarca</h2>
                    <hr>
                    <div class="row">
                        <div class="form-group col">
                            <label for="marca_id">Marca: </label>
                            <select  name="marca_id" id="marca_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($marcas as $m)
                                <option value="{{ $m->id }}">{{ $m->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row" id="sub" style="display:none"><br>
                        <div class="form-group col">
                            <label for="descripcion">Descripción: </label>
                            <input class="bg-light shadow-sm border-0 form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="">
                        </div>
                    </div>

                    <br>
                    <div class="text-center" id="save" style="display:none">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                    </div>
                </form>
                <br>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/usuario/submarca.js') }}"></script>
@endsection