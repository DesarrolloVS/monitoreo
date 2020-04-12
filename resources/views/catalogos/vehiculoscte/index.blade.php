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
            <h4> CATÁLOGO VEHÍCULOS {{ $cliente->nombre }} </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item active" >Catálogo Vehículos {{ $cliente->nombre }}</li>
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
                <a class="btn btn-primary" id="" href="/cat_vehiculos/create/{{ $cliente->id }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Vehículo</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
            @if($vehiculos->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Placa</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Gps</th>
                                <!-- <th class="text-center">Responsable</th> -->
                                <th class="text-center">Modificar</th>
                            </tr>
                        </thead>

                        @foreach($vehiculos as $x)
                        <tr>
                            <td class="text-center">{{ $x->id }}</td>
                            <td class="text-center">{{ $x->placa }}</td>
                            <td class="text-center">{{ $x->descripcion }}</td>
                            <td class="text-center">{{ $x->marca }}</td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_vehiculos/{{ $x->id }}/estatus/{{ $cliente->id }}/cliente">{{ ($x->estadovehiculo_id == "" ) ? estatus_vehiculos($x->estadovehiculo_id) : $x->estadovehiculo->descripcion }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_vehiculos/{{ $x->id }}/gps/{{ $cliente->id }}/cliente">{{ ($x->gpscliente_id == "" ) ? "NO ASIGNADO" : $x->gpscliente->imei }}&emsp;<i class="fas fa-location-arrow"></i></a></td>
                            <!-- <td class="text-center"><a class="btn btn-warning btn-sm" href="/cat_vehiculos/{{-- $x->id --}}/resp">Responsables&emsp;<i class="fas fa-user-check"></i></a></td> -->
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_vehiculos/{{ $x->id }}/edit/{{ $cliente->id }}/cliente"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row">
                <br><br><br><br>
                <div class="col">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atención: </strong> No hay registros de vehículos para este cliente.
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
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/vehiculos/cliente.js') }}"></script>
@endsection