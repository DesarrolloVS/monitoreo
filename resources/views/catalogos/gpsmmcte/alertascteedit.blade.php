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
            <h5>Modificar Alerta Cliente:</h5>
            <h5>Gps: {{$gpsmmcte->marca}} : {{ $gpsmmcte->modelo}} : Alerta: {{ $alertammcte->id }}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Admón Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{$cliente->id}}/gpsmmcte">GPS MM  Cte</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmmcte/{{ $gpsmarcamodelo_id}}/alertascte">Alertas Cte GPS MM</a></li>
                <li class="breadcrumb-item active">Modificar Alerta</li>
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
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsmmcte/{{ $alertammcte->id}}/alertascteupd" method="POST">
                        <input type="hidden" name="id_alertammcte" id="id_alertammcte" value="{{ $alertammcte->id }}">
                        <input type="hidden" name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" value="{{ $gpsmarcamodelo_id }}">

                        <hr>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col">
                                <div class="form-group col col-md-12">
                                    <label for="desc_corta" class="list-group-item list-group-item-dark">Descripción Corta:</label>
                                    <label for="desc_corta" class="list-group-item list-group-item-action">{{ $alertammcte->desc_corta }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group colcol-md-12">
                                    <label for="marca" class="list-group-item list-group-item-dark">Descripción a mostrar: </label>
                                    <label for="descripcion" class="list-group-item list-group-item-action">{{ $alertammcte->descripcion }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                            <div class="col">
                                <input type="hidden" name="tipoconfiguracion_id" id="tipoconfiguracion_id"
                                value="{{ $alertammcte->tipoconfiguracion_id }}">
                                <label for="tipoconfiguracion" class="list-group-item list-group-item-dark">Tipo de configuración: </label>
                                <label for="tipoconfiguracion" class="list-group-item list-group-item-action">  {{$alertammcte->tipoconfiguracion_id}} - {{ $alertammcte->tipoconfiguracion->descripcion }}</label>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            @if($alertammcte->tipoconfiguracion_id == 3 or $alertammcte->tipoconfiguracion_id == 4 or $alertammcte->tipoconfiguracion_id == 5 or $alertammcte->tipoconfiguracion_id == 6)
                                <div class="form-group col-md-4" id="fid_tipoveh" style="display:show">
                                    <label for="tipovehiculo_id">Tipo de Vehículo: </label><br>
                                    <label for="tipovehiculo">{{ $alertammcte->tipovehiculo->descripcion }}</label>
                                </div>
                            @endif

                            <div class="form-group col-md-4">
                                <label for="camposgps_id"><strong>Campo GPS:</strong></label><br>
                                <label for="camposgps">{{ $alertammcte->camposgps->campo }}</label>
                                </select>
                            </div>
                            @if($alertammcte->tipoconfiguracion_id == 7 or $alertammcte->tipoconfiguracion_id == 8 or $alertammcte->tipoconfiguracion_id == 9 or $alertammcte->tipoconfiguracion_id == 10)
                                <div class="form-group col-md-4"  id="fi_campocond" style="display:show">
                                    <label for="campo_cond">Campo condición: </label><br>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="campo_cond" name="campo_cond" placeholder="Campo condición" value="{{ $alertammcte->campos_condicion }}">
                                {!! $errors->first('campo_cond', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            @endif

                            <div class="form-group col-md-2"  id="fi_parametrosn" style="display:none">
                                <div class="checkbox">
                                    <label><br> <input type="checkbox" value="1" name="parametro_sn" id="parametro_sn"
                                        @if ($alertammcte->pov == true)
                                        checked
                                        @endif
                                         > Parametro </label>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col-md-4"  id="fi_repetir" style="display:none">
                                <label for="marca">Repetir: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="repetir" name="repetir" placeholder="Repetir" value="{{ $alertammcte->repetir }}">
                                {!! $errors->first('repetir', '<span class="badge badge-danger">:message </span>') !!}
                            </div>

                            <div class="form-group col-md-4"  id="fi_valor" style="display:none">
                                <label for="marca">Valor: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="valor" name="valor" placeholder="Valor" value="{{ $alertammcte->valor }}">
                                {!! $errors->first('valor', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-4" id="fi_parametro" style="display:none">
                                <label for="parametros_id">Parámetro: </label>
                                <select name="parametros_id" id="parametros_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                    @foreach($parametros as $param)
                                    <option value="{{ $param->id }}" @if($alertammcte->parametros_id == $param->parametro_id) selected @endif >{{ $param->parametro }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('parametros_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>

                            <div class="form-group col-md-4" id="fi_gravedad" style="display:show">
                                <label for="gravedad_id">Tipo de Gravedad: </label>
                                <select name="gravedad_id" id="gravedad_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                    @foreach($tipogravedad as $grav)
                                    <option value="{{ $grav->id }}" @if($alertammcte->tipogravedad_id == $grav->id) selected @endif >{{ $grav->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('gravedad_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
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
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/alertaste/eventoseditcte.js') }}">
</script>
@endsection