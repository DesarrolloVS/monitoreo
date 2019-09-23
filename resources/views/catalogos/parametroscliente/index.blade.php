@extends('layout')

@section ('css')
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="">Catálogo Parametros Cliente</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h2 class="text-center">CATÁLOGO PARAMETROS CLIENTE</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-4 my-3">
                    <!-- <div class="bg-white shadow py-3 px-4 rounded"> -->
                    

                    <div class="form-group">
                        <label for="cliente_id">Cliente: </label>
                        <select name="cliente_id" id="cliente_id" class="form-control bg-light shadow-sm border-0">
                            <option value="">Seleccione una Opción</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" 
                            @isset($id_cliente)
                            @if($cliente->id = $id_cliente)
                            selected
                            @endif
                            @endisset
                            >{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col" id="tabla_registros"></div>
            </div>


            <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $id_cliente }}">

        </div>
    </div>
</div>
@endsection
@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/cliente/parametros.js') }}"></script>
@endsection

