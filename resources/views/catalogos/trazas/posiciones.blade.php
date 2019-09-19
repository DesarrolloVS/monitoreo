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
                        <li class="breadcrumb-item"><a href="/cat_trazas">Catálogo Trazas</a></li>
                        <li class="breadcrumb-item active" aria-current="">Administrar Posiciones</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <p class="my-0">Marca: {{ $t->gpsmarcamodelo->marca }}</p>
                    <p class="my-0">Modelo: {{ $t->gpsmarcamodelo->modelo }}</p>
                    <p class="my-0">Tipo Traza: {{ $t->tipotraza->descripcion }}</p>
                </div>
            </div>

            <form class="bg-white shadow rounded py-3 px-4 my-3" action="/cat_posiciones/{{ $t->id }}" method="POST">
                <h2 class="text-center">Administrar Posiciones</h2>
                <hr>
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label for="posicion">Posicion: </label>
                        <select name="posicion" id="posicion" class="form-control bg-light shadow-sm border-0">
                            <option value="">Seleccione una Opción</option>
                            @foreach($posiciones as $p)
                            <option value="{{ $p }}">Posicion {{ $p }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('posicion', '<small style="color:red">:message</small>') !!}
                    </div>
                    <div class="form-group col">
                        <label for="camposgps_id">Campos GPS: </label>
                        <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0">
                            <option value="">Seleccione una Opción</option>
                            @foreach($campos as $c)
                            <option value="{{ $c->id }}">{{ $c->descripcion }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('camposgps_id', '<small style="color:red">:message</small>') !!}
                    </div>
                </div>

                <br>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                    </div>
            </form>

            @if($ps->first())
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Posicion</th>
                                <th class="text-center">Campo</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($ps as $x)
                        <tr>
                            <td class="text-center">{{ $x->id }}</td>
                            <td class="text-center">{{ $x->posicion }}</td>
                            <td class="text-center">{{ $x->camposgps->descripcion }}</td>
                            <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_trazas/{{ $x->id }}/confirmDeletePosicion"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                    <br><br>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atención: </strong> No hay registros de posiciones para esta traza.
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section ('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/catalogos/gps/posiciones.js') }}"></script>
@endsection