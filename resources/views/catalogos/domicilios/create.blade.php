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
            <h4>Agregar Domicilio - <small>{{ $cliente->nombre }}</small></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente->id }}/domicilios">Domicilios</a></li>
                <li class="breadcrumb-item active" aria-current="">Agregar Registro</li>
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
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_domicilios/{{ $cliente->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="calle">Calle: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="calle" name="calle" placeholder="Calle" value="">
                                {!! $errors->first('calle', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exterior">Número Exterior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="exterior" name="exterior" placeholder="Número Exterior" value="">
                                {!! $errors->first('exterior', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="interior">Número Interior: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="interior" name="interior" placeholder="Numero Interior" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="colonia">Colonia: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="colonia" name="colonia" placeholder="Colonia" value="">
                                {!! $errors->first('colonia', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cp">C.P. </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="cp" name="cp" placeholder="Código Postal" value="">
                                {!! $errors->first('cp', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="estado">Estado: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="estado" name="estado" placeholder="Estado" value="">
                                {!! $errors->first('estado', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ciiudad">Ciudad o Municipio: </label>
                                <input class="form-control form-control-sm shadow-sm border-0 bg-light" type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="">
                                {!! $errors->first('ciudad', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipodomicilio_id">Tipo de Domicilio: </label>
                                <select name="tipodomicilio_id" id="tipodomicilio_id" class="form-control form-control-sm shadow-sm border-0 bg-light">
                                    @foreach($tds as $td)
                                        <option value="{{ $td->id }}">{{ $td->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipodomicilio_id', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
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