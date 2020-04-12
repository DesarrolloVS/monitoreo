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
            <h4>Agregar Usuario Propio</span></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_usuarios">Catálogo Usuarios</a></li>
                <li class="breadcrumb-item active">Agregar Usuario</li>
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
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_usuarios" method="POST">
                        <hr>
                        @csrf

                        <div id="datos_usuario" style="display:show">

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nombre">Nombre: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                                    {!! $errors->first('nombre', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="paterno">Paterno: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="paterno" name="paterno" placeholder="Paterno" value="{{old('paterno')}}">
                                    {!! $errors->first('paterno', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="materno">Materno: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="materno" name="materno" placeholder="Materno" value="{{old('materno')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="email">Correo: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="email" name="email" placeholder="Correo" value="{{old('email')}}">
                                    {!! $errors->first('email', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rfc">RFC: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="rfc" name="rfc" placeholder="RFC" value="{{old('rfc')}}">
                                    {!! $errors->first('rfc', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="curp">CURP: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="curp" name="curp" placeholder="CURP" value="{{old('curp')}}">
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                            </div>
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
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/usuario/usuario.js') }}"></script>
@endsection