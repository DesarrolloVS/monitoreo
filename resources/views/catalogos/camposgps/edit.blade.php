@extends('core.main')
@section('content')
    @include('layouts.admin.nav')
    @include('layouts.admin.sidebar')
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Modificar Campo GPS</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_camposgps">Catálogo Campos GPS</a></li>
                <li class="breadcrumb-item active">Modificar Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <form class="bg-white shadow rounded py-3 px-4" action="/cat_camposgps/{{ $camposgps->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col">
                            <label for="descripcion">Campo: </label>
                            <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="campo" placeholder="Nombre del campo" value="{{ $camposgps->campo }}">
                            {!! $errors->first('campo', '<span class="badge badge-danger">:message </span>') !!}
                        </div>
                        <div class="form-group col">
                            <label for="descripcion">Descripción: </label>
                            <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripción" value="{{ $camposgps->descripcion }}">
                            {!! $errors->first('descripcion', '<span class="badge badge-danger">:message </span>') !!}
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