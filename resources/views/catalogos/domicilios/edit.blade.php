@extends('core.main')

@section('content')

    <!-- Navbar -->
    @include('layouts.admin.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin.sidebar')
    <!-- /.Main Sidebar Container -->
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Modificar Domicilio</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $domicilio->cliente_id }}/domicilios">Domicilios</a></li>
                <li class="breadcrumb-item active">Modificar Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
            <div class="row">
                <div class="col">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_domicilios/{{ $domicilio->id }}" method="POST">
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="calle">Calle: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="calle" name="calle" placeholder="Calle" value="{{ $domicilio->calle }}">
                                {!! $errors->first('calle', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exterior">Número Exterior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="exterior" name="exterior" placeholder="Número Exterior" value="{{ $domicilio->exterior }}">
                                {!! $errors->first('exterior', '<span class="badge badge-danger">:message</span>') !!}
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
                                {!! $errors->first('colonia', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cp">C.P. </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="cp" name="cp" placeholder="Código postal" value="{{ $domicilio->cp }}">
                                {!! $errors->first('cp', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado">Estado: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="estado" name="estado" placeholder="Estado" value="{{ $domicilio->estado }}">
                                {!! $errors->first('estado', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ciiudad">Ciudad o Municipio: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="{{ $domicilio->ciudad }}">
                                {!! $errors->first('ciudad', '<span class="badge badge-danger">:message</span>') !!}
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
                                {!! $errors->first('tipodomicilio_id', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>

    <!-- Control Sidebar -->
    @include('layouts.admin.controlbar')
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    @include('layouts.admin.footer')

@endsection

@section ('scripts')
@endsection