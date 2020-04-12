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
            <h5>Histórico: <small>Placa: {{ $v->placa }} </small></h5>
            <h5 class="">Gps Actual: {{ ($v->gpscliente_id == "" ) ? "NO ASIGNADO" : $v->gpscliente->imei }}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente }}/vehiculoscte"> Vehículos Cliente</a></li>
                <li class="breadcrumb-item active">Historico GPS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Imei</th>
                                <th class="text-center">Serie GPS</th>
                                <th class="text-center">Placa</th>
                                <th class="text-center">Fecha de asignacion</th>
                            </tr>
                        </thead>

                        @foreach($historico as $h)
                        <tr>
                            <td class="text-center">{{ $h->id }}</td>
                            <td class="text-center">{{ $h->imei }}</td>
                            <td class="text-center">{{ $h->serie }}</td>
                            <td class="text-center">{{ $h->placa }}</td>
                            <td class="text-center">{{ $h->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
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