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
            <h4>Alertas GPS {{ $gps->marca }} - {{ $gps->modelo}}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca - Modelo</a></li>
                <li class="breadcrumb-item active">Alertas GPS Marca - Modelo</li>
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
                <a class="btn btn-primary" href="/cat_gpsalerta/{{$gps->id}}/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Alerta</a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                @if($alertasmm->first())
                    <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 10px"><small>Id</small></th>
                                        <th class="text-center"><small>Desc. Corta</small></th>
                                        <th class="text-center"><small>Tipo Conf.</small></th>
                                        <th class="text-center"><small>Campo</small></th>
                                        <th class="text-center"><small>Campos cond.</small></th>
                                        <th class="text-center"><small>Valor</small></th>
                                        <th class="text-center"><small>Parametro</small></th>
                                        <th class="text-center"><small>Repetir</small></th>
                                        <th class="text-center"><small>Tipo Vehic</small></th>
                                        <th  style="width: 10px"><small>Modificar</small></th>
                                        <th  style="width: 10px"><small>Estatus</small></th>
                                    </tr>
                                </thead>
                                @foreach($alertasmm as $x)
                                <tr>
                                    <td class="text-center">{{ $x->id }}</td>
                                    <td class="text-center"><small>{{ $x->desc_corta }}</small></td>
                                    <td class="text-center" title=" {{ $x->tipoconfiguracion->descripcion }}">
                                        {{ $x->tipoconfiguracion->id}}</td>
                                    <td class="text-center"><small>{{ $x->camposgps->campo }}</small></td>

                                    <td class="text-center">
                                        {{  $x->campos_condicion }}
                                    </td>
                                    <td class="text-center">{{ $x->valor }}</td>
                                    <td class="text-center" title="{{ $x->parametros_id <> null ? $x->parametros->parametro : ''}}" > {{ $x->parametros_id <> null ? $x->parametros_id : ''}} </td>
                                    <td class="text-center">{{ $x->repetir }}</td>
                                    <td class="text-center" title="{{ $x->tipovehiculo_id <> null ? $x->tipovehiculo->descripcion : ''}}" > {{ $x->tipovehiculo_id <> null ? $x->tipovehiculo_id : ''}} </td>
                                    <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_gpsalerta/{{ $x->id }}/edit">
                                        <i class="fa  fa-edit"></i>
                                    </a></td>

                                    @if($x->estado == true)
                                        <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpsalerta/{{ $x->id }}/estatus"><small>Activa</smalll> </a></td>
                                    @else
                                        <td class="text-center"><a class="btn btn-secondary btn-sm" href="/cat_gpsalerta/{{ $x->id }}/estatus"><small>Inactiva</smalll></a></td>
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