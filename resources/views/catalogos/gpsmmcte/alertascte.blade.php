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
            <h5>Alertas Marca Modelo Cliente - {{ $cliente->nombre }}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Administración Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{$cliente->id}}/gpsmmcte">GPS MM  cliente</a></li>
                <li class="breadcrumb-item active">Alertas M M Cliente</li>
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
                <a class="btn btn-primary" href="/cat_gpsmmcte/{{ $gpsmmcte->id }}/alertasctecreate"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;
                @if($alertasmmcte->first())
                    Actualizar Alertas
                @else
                    Crear Alertas
                @endif
                </a>
            </div>
          </div>
        </div>
      </div>
  </section>

    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
            @if($alertasmmcte->first())
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center"><small>Id</small></th>
                                <th class="text-center"><small>Desc. Corta / Campo</small></th>
                                <th class="text-center"><small>T. Conf.</small></th>
                                <th class="text-center"><small>Campos cond.</small></th>
                                <th class="text-center"><small>Valor</small></th>
                                <th class="text-center"><small>Parametro</small></th>
                                <th class="text-center"><small>Repetir</small></th>
                                <th class="text-center"><small>Tipo Vehic</small></th>
                                <th class="text-center"><small>Gravedad</small></th>
                                <th class="text-center"><small>Modificar</small></th>
                                <th class="text-center"><small>Estatus</small></th>
                            </tr>
                        </thead>
                        @foreach($alertasmmcte as $x)
                        <tr>
                            <td class="text-center"><small>{{ $x->id }}</small></td>
                            <td class="text-center"><small>{{ $x->desc_corta }} <br> {{ $x->camposgps->campo }}</small></td>
                            <td class="text-center" title=" {{ $x->tipoconfiguracion->descripcion }}"><small>{{ $x->tipoconfiguracion->id}}</small></td>
                            <td class="text-center"><small>{{  $x->campos_condicion }}</small></td>
                            <td class="text-center"><small>{{ $x->valor }}</small></td>
                            <td class="text-center" title= "{{ $x->parametros_id <> null ? $x->parametros->parametro : ''}} " >{{ $x->parametros_id <> null ? $x->parametros_id : ''}}</td>
                            <td class="text-center"><small>{{ $x->repetir }}</small></td>
                            <td class="text-center" title="{{ $x->tipovehiculo_id <> null ? $x->tipovehiculo->descripcion : ''}}" ><small>{{ $x->tipovehiculo_id <> null ? $x->tipovehiculo_id : ''}}</small></td>
                            <td class="text-center"><small>{{ $x->tipogravedad_id <> null ? $x->tipogravedad->descripcion : '' }}</small></td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="/cat_gpsmmcte/{{ $x->id }}/alertascteedit">
                                <i class="fa  fa-edit"></i>
                            </a></td>

                            @if($x->estado == true)
                                <td class="text-center"><a class="btn btn-success btn-sm" href="/cat_gpsmmcte/{{ $x->id }}/estatus">Activa <i class="fa  fa-exchange-alt"></i>&emsp;</a></td>
                            @else
                                <td class="text-center"><a class="btn btn-secondary btn-sm" href="/cat_gpsmmcte/{{ $x->id }}/estatus">Inactiva <i class="fa  fa-exchange-alt"></i>&emsp;</a></td>
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