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
                        <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                        <li class="breadcrumb-item"><a href="/cat_clientes/{{ $domicilio->cliente_id }}/domicilios">Domicilios</a></li>
                        <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_domicilios/{{ $domicilio->id }}" method="POST">
                        <h3 class="text-center">Modificar Domicilio</h3>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="calle">Calle: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="calle" name="calle" placeholder="Calle" value="{{ $domicilio->calle }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exterior">Número Exterior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="exterior" name="exterior" placeholder="Número Exterior" value="{{ $domicilio->exterior }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="interior">Número Interior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="interior" name="interior" placeholder="Numero Interior" value="{{ $domicilio->interior }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="colonia">Colonia: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="colonia" name="colonia" placeholder="Colonia" value="{{ $domicilio->colonia }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cp">C.P. </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="cp" name="cp" placeholder="Colonia" value="{{ $domicilio->cp }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado">Estado: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="estado" name="estado" placeholder="Estado" value="{{ $domicilio->estado }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ciiudad">Ciudad o Municipio: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="{{ $domicilio->ciudad }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipodomicilio_id">Tipo de Domicilio: </label>
                                <select name="tipodomicilio_id" id="tipodomicilio_id" class="form-control form-control-sm shadow-sm border-0 bg-light">
                                    @foreach($tds as $td)
                                    <option value="{{ $td->id }}" 
                                    @if($domicilio->tipodomicilio_id == $td->id)
                                    selected
                                    @endif
                                    >{{ $td->descripcion }}</option>
                                    @endforeach
                                </select>
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