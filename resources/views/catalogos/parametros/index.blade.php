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
            <h4>Administración Parametros Generales</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Administración Parametros</li>
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
                <a class="btn btn-primary pull-right" href="/cat_parametros/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Parámetro</a>
            </div>
          </div>
        </div>
      </div>
  </section>


    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
            @if($pc->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Parametro</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Modificar</th>
                                <th class="text-center">Estatus</th>
                            </tr>
                        </thead>
                        @foreach($pc as $x)
                        <tr>
                            <td class="text-center">{{ $x->id }}</td>
                            <td class="text-center">{{ $x->parametro }}</td>
                            <td class="text-center">{{ $x->valor }}</td>
                            <td class="text-center"><small>{{ $x->descripcion }}</small></td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_parametros/{{ $x->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>

                            @if($x->estado == true)
                                <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_parametros/{{ $x->id }}/estatus">Activo <i class="fa  fa-exchange-alt"></i>&emsp;</a></td>
                            @else
                                <td class="text-center"><a class="btn btn-secondary btn-sm" href="/cat_parametros/{{ $x->id }}/estatus">Inactivo <i class="fa  fa-exchange-alt"></i>&emsp;</a></td>
                            @endif
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
                        <strong>Atención: </strong> No hay registros de parametros.
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