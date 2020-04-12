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
            <h3 class="text-center">Modificar Registro</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_parametros">Catálogo Parametros</a></li>
                <li class="breadcrumb-item active" aria-current="">Modificar Registro</li>
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
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_parametros/{{ $pc->id }}" method="POST">
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row"><br><br>
                            <div class="form-group col-md-4">
                                <label for="parametro">Parametro: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="parametro" name="parametro" placeholder="Parametro" value="{{ $pc->parametro }}">
                                {!! $errors->first('parametro', '<span class="badge badge-danger">:message </span>') !!}
                            </div>

                            <div class="form-group col-md-4">
                                <label for="descripcion">Descripcion: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="descripcion" name="descripcion" placeholder="Descripcion" value="{{ $pc->descripcion }}">
                                {!! $errors->first('descripcion', '<span class="badge badge-danger">:message </span>') !!}
                            </div>

                            <div class="form-group col-md-4">
                                <label for="valor">Valor: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="valor" name="valor" placeholder="Valor" value="{{ $pc->valor }}">
                                {!! $errors->first('valor', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
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