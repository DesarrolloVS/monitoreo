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
            <h5>Roles Actuales:</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente->id }}/usuarioscte">Catálogo Usuarios: {{ $cliente->nombre }}  </a></li>
                <li class="breadcrumb-item active">Modificar Roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <form class="bg-white shadow py-3 px-4" action="/cat_usuarioscte/{{ $usuario->id }}/roles/{{ $cliente->id }}/cliente" method="POST">
                        <h4 class="text-center">Modificar Roles Usuario: <small>{{ $usuario->nombre }} {{ $usuario->paterno }} {{ $usuario->materno }}</small></h4>
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="rolesusuariocte_id">Elija roles para el usuario: </label>
                                <div class="checkbox">
                                    @foreach($roles as $id => $name)
                                        <label>
                                            <input type="checkbox"
                                            value="{{$id}}"
                                            {{ $rolesusu->contains($id) ? 'checked' : '' }}
                                            name="rolesusuariocte_id[]">
                                            {{ $name }}
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                                {!! $errors->first('rolesusuariocte_id', '<span class="badge badge-danger">:message</span>') !!}
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