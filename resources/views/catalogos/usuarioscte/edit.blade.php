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
            <h4>Modificar Usuario</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente->id }}/usuarioscte">Catálogo Usuarios: {{ $cliente->nombre }}  </a></li>
                <li class="breadcrumb-item active">Modificar Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_usuarioscte/{{ $usuario->id }}/edit/{{ $cliente->id }}/cliente" method="POST">
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="nombre">Nombre: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{ $usuario->nombre }}">
                                {!! $errors->first('nombre', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="paterno">Paterno: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="paterno" name="paterno" placeholder="Paterno" value="{{ $usuario->paterno }}">
                                {!! $errors->first('paterno', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="materno">Materno: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="materno" name="materno" placeholder="Materno" value="{{ $usuario->materno }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="email">Correo: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="email" name="email" placeholder="Correo" value="{{ $usuario->email }}">
                                {!! $errors->first('email', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rfc">RFC: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="rfc" name="rfc" placeholder="RFC" value="{{ $usuario->rfc }}">
                                {!! $errors->first('rfc', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="curp">CURP: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="curp" name="curp" placeholder="CURP" value="{{ $usuario->curp }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tipoacceso_id">Tipo de acceso: </label>
                                <select multiple name="tipoacceso_id[]" id="tipoacceso_id[]" class="form-control bg-light shadow-sm border-0">
                                    <option value="rep_legal"
                                    @if($usuario->rep_legal == 1)
                                    selected
                                    @endif
                                    >Representante Legal</option>
                                    <option value="contacto"
                                    @if($usuario->contacto == 1)
                                    selected
                                    @endif
                                    >Contacto</option>
                                    <option value="usuario"
                                    @if($usuario->usuario == 1)
                                    selected
                                    @endif
                                    >Usuario</option>
                                    <option value="aviso"
                                    @if($usuario->aviso == 1)
                                    selected
                                    @endif
                                    >Aviso Correo</option>
                                </select>
                                {!! $errors->first('tipoacceso_id', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>
                        <br><br>
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
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/usuario/usuario.js') }}"></script>
@endsection