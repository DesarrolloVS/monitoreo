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
            <h4>Domicilios - {{ $cliente->nombre }}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item active">Domicilios</li>
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
                <a class="btn btn-primary" href="/cat_domicilios/{{ $cliente->id }}/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Domicilio</a>
            </div>
          </div>
        </div>
      </div>
  </section>


    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
            @if($domicilios->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Ciudad</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Tipo Domicilio</th>
                                <th class="text-center">Modificar</th>
                                <!-- <th class="text-center">Eliminar</th> -->
                            </tr>
                        </thead>
                        @foreach($domicilios as $d)
                        <tr>
                            <td class="text-center">{{ $d->id }}</td>
                            <td class="text-center">{{ $d->calle }}, {{ $d->exterior }}@if($d->interior), {{ $d->interior }}@endif, {{ $d->colonia }}, {{ $d->cp }}</td>
                            <td class="text-center">{{ $d->ciudad }}</td>
                            <td class="text-center">{{ $d->estado }}</td>
                            <td class="text-center">{{ $d->tipodomicilio_id }}</td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_domicilios/{{ $d->id }}/edit"><i class="fas fa-pencil-alt"></i></a></td>
                            <!-- <td class="text-center"><a class="btn btn-danger btn-sm" href="/cat_tiposervicios/{{ $d->id }}/confirmDelete"><i class="fas fa-trash-alt"></i></a></td> -->
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