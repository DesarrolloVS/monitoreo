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
                        <li class="breadcrumb-item"><a href="/cat_tipoempleados">Catálogo Tipo de Empleados</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_tipoempleados/{{ $te->id }}" method="POST">
                    <h3 class="text-center">Modificar Registro</h3>
                    <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="cliente_id">Cliente: </label>
                                <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" 
                                        @if($cliente->id == $te->cliente_id)
                                        selected
                                        @endif
                                        >{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="descripcion">Descripción: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $te->descripcion }}">
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('scripts')
@endsection