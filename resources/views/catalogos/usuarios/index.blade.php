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
            <h4>Administración Usuarios Propios</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Catálogo Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
                <a class="btn btn-primary" href="/cat_usuarios/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Usuario</a>
            </div>
          </div>
        </div>
      </div>
  </section>


    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
            @if($usuarios->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Perfiles</th>
                                <th class="text-center">Modificar</th>
                            </tr>
                        </thead>
                        @foreach($usuarios as $u)
                        <tr>
                            <td class="text-center">{{ $u->id }}</td>
                            <td class="text-center">{{ $u->nombre." ".$u->paterno." ".$u->materno }} </td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_usuarios/{{ $u->id }}/estatus">{{ ($u->estadousuario_id == "" ) ? estatus_cliente($u->estadousuario_id) : $u->estadousuario_id }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_usuarios/{{$u->id}}/roles">
                                {{ $u->roles->pluck('display_name')->implode(' - ')}}
                                <br><i class="far fa-id-card"></i></a>
                            </td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_usuarios/{{ $u->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                    <br><br>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atención: </strong> No hay registros para este catálogo.
                    </div>
                </div>
            </div>
            @endif
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