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
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_turnos/{{ $turno->id }}" method="POST">
                        <h2 class="d-flex justify-content-center">Modificar Registro</h2>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col">
                                <label for="nombre">Descripcion turno: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripciòn Turno" value="{{ $turno->descripcion }}">
                            </div>
                            <div class="form-group col">
                                <label for="tipoturno_id">Tipo de Turno: </label>
                                <select name="tipoturno_id" id="tipoturno_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tt as $t)
                                        <option value="{{ $t->id }}" 
                                        @if($t->id == $turno->tipoturno_id)
                                        selected
                                        @endif
                                        >{{ $t->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="horainicio">Hora Inicio: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="time" id="horainicio" name="horainicio" placeholder="Hora Inicio" value="{{ $turno->horainicio }}">
                            </div>                
                            <div class="form-group col">
                                <label for="horafin">Hora Fin: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="time" id="horafin" name="horafin" placeholder="Hora Fin" value="{{ $turno->horafin }}">
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