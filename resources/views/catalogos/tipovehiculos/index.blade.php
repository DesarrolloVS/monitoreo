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
            <h4>Catálogo Tipo de Vehículos</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Catálogo Tipo de Vehículos</li>
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
                <a class="btn btn-primary" href="/cat_tipovehiculos/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Tipo de Vehículo</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
            @if($tv->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead  class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        @foreach($tv as $x)
                        <tr>
                            <td class="text-center">{{ $x->id }}</td>
                            <td class="text-center">{{ $x->descripcion }}</td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_tipovehiculos/{{ $x->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-danger btn-sm disabled" href="/cat_tipovehiculos/{{ $x->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row col">
            <br><br><br><br>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Atención: </strong> No hay registros para este catálogo.
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