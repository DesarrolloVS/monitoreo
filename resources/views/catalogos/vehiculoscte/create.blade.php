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
            <h4>Agregar Vehículo: {{ $nombre }}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente_id }}/vehiculoscte"> Vehículos Cliente</a></li>
                <li class="breadcrumb-item active">Agregar Vehículo</li>
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
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos" method="POST">
                        <hr>
                        @csrf
                        <div class="row">

                            <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente_id }}">

                            <div class="form-group col-md-3">
                                <label for="descripcion">Descripcion Vehículo: </label>
                                <input class="form-control form-control-sm bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="">
                                {!! $errors->first('descripcion', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-3">
                                <label for="placa">Placa: </label>
                                <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="placa" name="placa" placeholder="Placa" value="">
                                {!! $errors->first('placa', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-3">
                                <label for="placa">Modelo: </label>
                                <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="modelo" name="modelo" placeholder="Modelo" value="">
                                {!! $errors->first('modelo', '<span class="badge badge-danger">:message </span>') !!}
                            </div>

                            <div class="form-group col-md-3">
                                <label for="tipovehiculo_id">Tipo de Vehículo: </label>
                                <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control  form-control-sm bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tvs as $tv)
                                    <option value="{{ $tv->id }}">{{ $tv->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipovehiculo_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="placa">Marca: </label>
                                <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="marca" name="marca" placeholder="Marca" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="placa">Submarca: </label>
                                <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="submarca" name="submarca" placeholder="Submarca" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="serie">Serie: </label>
                                <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="color">Color: </label>
                                <input class="form-control  form-control-sm bg-light shadow-sm border-0" type="text" id="color" name="color" placeholder="Color" value="">
                            </div>
                        </div>


                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
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