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
                        <li class="breadcrumb-item"><a href="/cat_turnos">Catálogo Turnos</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Estado</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h3>Estatus Actual: {{ ($t->estadoturno_id == "" ) ? estatus_turno($t->estadoturno_id) : $t->estadoturno_id }}</h3>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br>
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_turnos/{{ $t->id }}/estatus" method="POST">
                        <h4 class="text-center">Modificar Estatus Turno: <small>{{ $t->descripcion }}</small></h4>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="estadoturno_id">Cambiar Estado a: </label>
                                <select name="estadoturno_id" id="estadoturno_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($estados as $estado)
                                    @if($estado->id != $t->estadoturno_id)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
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