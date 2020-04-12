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
            <h4>Administración Clientes</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="">Administración Clientes</li>
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
                <a class="btn btn-primary" href="/cat_clientes/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Cliente</a>
            </div>
          </div>
        </div>
      </div>
  </section>


    <section class="content">
        <div class="card card-solid">
            <div class="card-body">

            @if($clientes->first())
            <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><small>Id</small></th>
                                <th class="text-center"><small>Nombre</small></th>
                                <th class="text-center"><small>RFC</small></th>
                                <th class="text-center"><small>Modificar</small></th>
                                <th class="text-center"><small>Parámetros</small></th>
                                <th class="text-center"><small>GPS</small></th>
                                <th class="text-center"><small>Vehículos</small></th>
                                <th class="text-center"><small>Domicilios</small></th>
                                <th class="text-center"><small>Usuarios</small></th>
                                <th class="text-center"><small>Alertas</small></th>
                                <th class="text-center"><small>Estatus</small></th>
                            </tr>
                        </thead>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td class="text-center">{{ $cliente->id }}</td>
                            <td class="text-center">{{ $cliente->nombre }}</td>
                            <td class="text-center">{{ $cliente->rfc }}</td>

                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_clientes/{{ $cliente->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>


                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_clientes/{{ $cliente->id }}/parametroscte"><i class="fas fa-tasks"></i>&emsp;</a></td>

                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_clientes/{{ $cliente->id }}/gpsscte"><i class="fas fa-magic"></i>&emsp;</a></td>

                            <td class="text-center"><a href="/cat_clientes/{{ $cliente->id }}/vehiculoscte" class="btn btn-info btn-sm"><i class="fas fa-car-alt"></i>&emsp;</a></td>

                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_clientes/{{ $cliente->id }}/domicilios"><i class="fas fa-address-card"></i>&emsp;</a></td>


                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_clientes/{{ $cliente->id }}/usuarioscte"><i class="fas fa-users"></i>&emsp;</a></td>

                            <td class="text-center"><a href="/cat_clientes/{{ $cliente->id }}/gpsmmcte" class="btn btn-info btn-sm"><i class="fas fa-exclamation-triangle"></i>&emsp;</a></td>

                            <td class="text-center"><a href="/cat_clientes/{{ $cliente->id }}/estatus" class="btn btn-warning btn-sm">{{ $cliente->estadocliente_id }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
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
                        <strong>Atecion: </strong> No hay registros para este catálogo.
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