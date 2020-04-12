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
            <h4>Administración GPS Marca - Modelo</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca Modelo</a></li>
                <li class="breadcrumb-item active" >Modificar Registro</li>
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
                        <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsmarcamodelo/{{ $gps->id }}" method="POST">
                            <h2 class="text-center">Modificar Registro</h2>
                            <hr>
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="marca">Marca: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="marca" name="marca" placeholder="Marca" value="{{ $gps->marca }}">
                                    {!! $errors->first('marca', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modelo">Modelo: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="modelo" name="modelo" placeholder="Modelo" value="{{ $gps->modelo }}">
                                    {!! $errors->first('modelo', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
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