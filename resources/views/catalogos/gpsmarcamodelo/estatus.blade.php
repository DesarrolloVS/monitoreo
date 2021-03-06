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
            <h4>Estado Actual: {{ ($gps->estado == true ) ? "Activo" : "Inactivo" }}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca Modelo</a></li>
                <li class="breadcrumb-item active">Modificar estatus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <form class="bg-white shadow py-3 px-4" action="/cat_gpsmarcamodelo/{{ $gps->id }}/estatusupd" method="POST">
                    <input type="hidden" name="id_gpsmm" id="id_gpsmm" value="{{ $gps->id }}">
                    <h4 class="text-center">Modificar Estatus GPS: <small>{{ $gps->id }} </small></h4>
                    <hr>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col">
                            <label for="estadogps">Cambiar Estado a: </label>
                            <select name="estadogps" id="estadogps" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                <option value="1"
                                 @if($gps->estado == true) selected @endif
                                 >Activo</option>
                                <option value="0"
                                 @if($gps->estado == false) selected @endif
                                >Inactivo
                                </option>
                            </select>
                            {!! $errors->first('estadogps', '<span class="badge badge-danger">:message</span>') !!}
                        </div>
                    </div>

                    <br>
                    <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
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