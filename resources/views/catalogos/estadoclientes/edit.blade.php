@extends('core.main')
@section('content')
    @include('layouts.admin.nav')
    @include('layouts.admin.sidebar')
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Modificar Registro</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_estadoclientes">Catálogo Estados Clientes</a></li>
                <li class="breadcrumb-item active">Modificar Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <form class="bg-white shadow rounded py-3 px-4" action="/cat_estadoclientes/{{ $estado->id }}" method="POST">
                    <hr>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col">
                            <label for="descripcion">Descripción: </label>
                            <input class="form-control shadow-sm border-0 bg-light" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $estado->descripcion }}">
                            {!! $errors->first('descripcion', '<span class="badge badge-danger">:message </span>') !!}
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