@extends('core.main')
@section('content')
    @include('layouts.admin.nav')
    @include('layouts.admin.sidebar')
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Agregar Estado Vehiculo</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_estadosvehiculos">Catálogo Estados Vehículos</a></li>
                <li class="breadcrumb-item active">Agregar Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_estadosvehiculos" method="POST">
                        @csrf
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="descripcion">Descripción: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="">
                                    {!! $errors->first('descripcion', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
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