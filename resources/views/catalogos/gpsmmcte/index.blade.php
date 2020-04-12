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
            <h4>GPS Marca - Modelo Cliente</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Administración Clientes</a></li>
                <li class="breadcrumb-item active">GPS Marca Modelo Cliente</li>
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
                <a class="btn btn-primary" href="/cat_gpsmmcte/{{ $cliente->id }}/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar GPS Marca - Modelo para Cliente</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
            @if($gpsmmcte->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Marca</th>
                                <th class="text-center">Modelo</th>
                                <th class="text-center">Alertas Cliente</th>
                            </tr>
                        </thead>

                        @foreach($gpsmmcte as $g)
                        <tr>
                            <td class="text-center">{{ $g->id }}</td>
                            <td class="text-center">{{ $g->gpsmarcamodelo->marca }}</td>
                            <td class="text-center">{{ $g->gpsmarcamodelo->modelo}}</td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="/cat_gpsmmcte/{{ $g->id }}/alertascte"> <i class="fas fa-exclamation"></i>&emsp;Alertas </a></td>
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
                        <strong>Atención: </strong> No existen GPS Marca Modelo para este cliente.
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