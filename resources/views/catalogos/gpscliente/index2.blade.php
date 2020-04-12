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
            <h4> Gps's Cliente  {{ $nombre }}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item active">Catálogo GPS Clientes {{ $nombre }}</li>
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
                <a class="btn btn-primary" id="" href="/cat_gpscliente/create/{{ $cliente_id }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar GPS Cliente</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
            @if($gps->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Cliente</th>
                                <th class="text-center">Serie</th>
                                <th class="text-center">Imei</th>
                                <th class="text-center">Marca Modelo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Modificar</th>
                            </tr>
                        </thead>
                        @foreach($gps as $g)
                        <tr>
                            <td class="text-center">{{ $g->id }}</td>
                            <td class="text-center">{{ $g->cliente->nombre }} </td>
                            <td class="text-center">{{ $g->serie }}</td>
                            <td class="text-center">{{ $g->imei }}</td>
                            <td class="text-center">{{ $g->gpsmarcamodelo->marca}} / {{ $g->gpsmarcamodelo->modelo}}</td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpscliente/{{ $g->id }}/estatus/{{ $cliente_id}}/cliente">
                                {{ ($g->estadogpscliente_id == "" ) ? estatus_gps($g->estadogpscliente_id) : $g->estadogpscliente->descripcion }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpscliente/{{ $g->id }}/edit/{{ $cliente_id }}/cliente"><i class="fas fa-pencil-alt"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @else
            <div class="row" id="datos">
                <div class="col">
                    <br><br>
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Atención: </strong> No hay registros para este catálogo GPS Cliente.
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

@push('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/gpscliente/eventsIndex.js') }}"></script>
@endpush