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
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Estatus</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h3>Estatus Actual: {{ $cliente->estadocliente_id }}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_clientes/{{ $cliente->id }}/estatus" method="POST">
                        <h3 class="text-center">Modificar Estatus Cliente: <small>{{ $cliente->nombre }}</small></h3>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="estadocliente_id">Cambiar Estado a: </label>
                                <select name="estadocliente_id" id="estadocliente_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($estados as $estado)
                                    @if($estado->id != $cliente->estadocliente_id)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('estadocliente_id', '<span class="badge badge-danger"> :message </span>') !!}
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