@extends('layout')
@section ('css')
@endsection

@section('content')
<div class="container montse">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">

            <div class="row">
                <div class="col">
                    <ol class="breadcrumb bg-transparent d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/cat_gpsalerta">Catálogo Alertas GPS</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsalerta/{{ $ga->id }}" method="POST">
                        @csrf
                        @method('put')
                        <h2 class="text-center">Modificar Alerta GPS</h2>
                        <hr>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($mm as $m)
                                    <option value="{{ $m->id }}" 
                                    @if($m->id == $ga->gpsmarcamodelo_id)
                                    selected
                                    @endif
                                    >{{ $m->marca }} - {{ $m->modelo }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('gpsmarcamodelo_id', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="alerta">Alerta: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="alerta" name="alerta" placeholder="Alerta" value="{{ $ga->alerta }}">
                                {!! $errors->first('alerta', '<small style="color:red">:message</small>') !!}
                            </div>
                            <div class="form-group col">
                                <label for="descripcion">Descripción: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $ga->descripcion }}">
                                {!! $errors->first('descripcion', '<small style="color:red">:message</small>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col" id="complement">
                                <label for="camposgps_id">Campo: </label>
                                <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($campos as $c)
                                    <option value="{{ $c->camposgps_id }}" 
                                    @if($c->camposgps_id == $campo)
                                    selected
                                    @endif
                                    >{{ $c->camposgps->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('camposgps_id', '<small style="color:red">:message</small>') !!}
                            </div>

                            <div class="form-group col">
                                <label for="condicion">Condicion: </label>
                                <select name="condicion" id="condicion" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    <option value="<" @if($ga->condicion == "<") selected @endif > Menor</option>
                                    <option value=">" @if($ga->condicion == ">") selected @endif >Mayor</option>
                                    <option value="=" @if($ga->condicion == "=") selected @endif >Igual</option>
                                </select>
                                {!! $errors->first('condicion', '<small style="color:red">:message</small>') !!}
                            </div>
                            <div class="form-group col">
                                <label for="valor">Valor: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="valor" name="valor" placeholder="Valor" value="{{ $ga->valor }}">
                                {!! $errors->first('valor', '<small style="color:red">:message</small>') !!}
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
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/catalogos/alertas/complement.js') }}"></script>
@endsection