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
            <h4>TRAZAS GPS {{ $gps->marca }} - {{ $gps->modelo}}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca - Modelo</a></li>
                <li class="breadcrumb-item active">Trazas GPS</li>
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
                <a class="btn btn-primary" href="/cat_trazas/{{$gps->id}}/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Traza</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                @if($trazasmm->first())
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Tipo Traza</th>
                                    <th class="text-center"># Posiciones</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Traza Posición</th>
                                    <th class="text-center">Modificar</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            @foreach($trazasmm as $x)
                            <tr>
                                <td class="text-center">{{ $x->id }}</td>
                                <td class="text-center">{{ $x->tipotraza->descripcion }}</td>
                                <td class="text-center">{{ $x->num_posiciones }}</td>
                                <!-- <td class="text-center"><a class="btn btn-info btn-xs" href="/cat_trazas/{{ $x->id }}/estatus">{{ ($x->estadotraza_id == "" ) ? "SIN ESTADO" : "CON ESTADO" }}&emsp;<i class="fas fa-exchange-alt"></i></a></td> -->
                                <td class="text-center"><a class="btn btn-info btn-sm" href="#">{{ ($x->estadotraza_id == "" ) ? "SIN ESTADO" : "CON ESTADO" }}&emsp;<i class="fas fa-exchange-alt"></i></a></td>
                                <td class="text-center"><a class="btn btn-warning btn-sm" href="/cat_trazas/{{ $x->id }}/posiciones"><i class="far fa-object-ungroup"></i></a></td>
                                <td class="text-center"><a class="btn btn-success btn-sm" href="#"><i class="fas fa-pencil-alt"></i></a></td>
                                <td class="text-center"><a class="btn btn-danger btn-sm disabled" href="#"><i class="fas fa-trash-alt"></i></a></td>
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
                            <strong>Atención: </strong> No hay registros para este GPS.
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