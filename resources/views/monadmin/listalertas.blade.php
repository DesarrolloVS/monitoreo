@extends('core.mainmapa')

@section('content')
    <!-- Navbar -->
    @include('layouts.mapa.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin.sidebar')
    <!-- /.Main Sidebar Container -->
    <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Listado de Alertas</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active">Listado de Registros</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                @if($alertas_cvg->first())
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id Alerta</th>
                                <th class="text-center">T conf</th>
                                <th class="text-center">Tipo reg</th>
                                <th class="text-center">Valor Actual</th>
                                <th class="text-center">Valor Nuevo</th>
                                <th class="text-center">FyH Actual</th>
                                <th class="text-center">Fyh Nuevo</th>
                                <th class="text-center">C - G - V</th>
                                <th class="text-center">Mostrar</th>
                                <th class="text-center">Alerta</th>
                                <th class="text-center">Activo</th>
                            </tr>
                        </thead>
                        @foreach($alertas_cvg as $a_cvg)
                        <tr>
                            <td class="text-center">{{ $a_cvg->id_alerta }}</td>
                            <td class="text-center">{{ $a_cvg->tipoconfiguracion_id }}</td>
                            <td class="text-center">{{ $a_cvg->tipo_registro }}</td>
                            <td class="text-center">{{ $a_cvg->valor_actual }}</td>
                            <td class="text-center">{{ $a_cvg->valor_nuevo }}</td>
                            <td class="text-center">{{ $a_cvg->fyh_actual }}</td>
                            <td class="text-center">{{ $a_cvg->fyh_nuevo }}</td>
                            <td class="text-center">{{ $a_cvg->cliente_id }} - {{$a_cvg->gps_id }} - {{ $a_cvg->vehiculo_id }}</td>
                            <td class="text-center">{{ $a_cvg->mostrar }}</td>
                            <td class="text-center">{{ $a_cvg->alerta }}</td>
                            <td class="text-center">{{ $a_cvg->activo }}</td>
                        </tr>
                        @endforeach
                    </table>
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