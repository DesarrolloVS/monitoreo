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
            <h4>Agregar Alerta Gps {{$gps->marca}} : {{ $gps->modelo}}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo">Catálogo GPS Marca Modelo</a></li>
                <li class="breadcrumb-item"><a href="/cat_gpsmarcamodelo/{{ $gps->id}}/alertasgpsmm">Alertas GPS Marca Modelo</a></li>
                <li class="breadcrumb-item active">Agregar Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
    <div class="card card-solid">
        <div class="card-body">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsalerta" method="POST">
                        <input type="hidden" name="id_gps" id="id_gps" value="{{ $gps->id }}">
                        <hr>
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="form-group col">
                                    <label for="marca">Descripción Corta: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="desc_corta" name="desc_corta" placeholder="Descripción Corta" value="">
                                    {!! $errors->first('desc_corta', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group col">
                                    <label for="marca">Descripción a mostrar: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="desc_mostrar" name="desc_mostrar" placeholder="Descripción a mostrar" value="">
                                    {!! $errors->first('desc_mostrar', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="tipoconfiguracion_id">Tipo de configuración: </label>
                                <select name="tipoconfiguracion_id" id="tipoconfiguracion_id" class="form-control bg-light shadow-sm border-0">
                                    <option value="">Seleccione una Opción</option>
                                    @foreach($tconf as $tc)
                                    <option value="{{ $tc->id }}">{{ $tc->id }}.-{{ $tc->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipoconfiguracion_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4" id="fid_tipoveh" style="display:none">
                                <label for="tipovehiculo_id">Tipo de Vehículo: </label>
                                <select name="tipovehiculo_id" id="tipovehiculo_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                    @foreach($tvehic as $tv)
                                    <option value="{{ $tv->id }}">{{ $tv->descripcion }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipovehiculo_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="camposgps_id">Campo GPS: </label>
                                <select name="camposgps_id" id="camposgps_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                    @foreach($camposgsp as $cgps)
                                    <option value="{{ $cgps->id }}">{{ $cgps->campo }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('camposgps_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-4"  id="fi_campocond" style="display:none">
                                <label for="marca">Campo condición: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="campo_cond" name="campo_cond" placeholder="Campo condición" value="">
                                {!! $errors->first('campo_cond', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-2"  id="fi_parametrosn" style="display:none">
                                <div class="checkbox">
                                    <label><br> <input type="checkbox" value="1" name="parametro_sn" id="parametro_sn"> Parametro </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"  id="fi_repetir" style="display:none">
                                <label for="marca">Repetir: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="repetir" name="repetir" placeholder="Repetir" value="">
                                {!! $errors->first('repetir', '<span class="badge badge-danger">:message </span>') !!}
                            </div>

                            <div class="form-group col-md-4"  id="fi_valor" style="display:none">
                                <label for="marca">Valor: </label>
                                <input class="form-control bg-light shadow-sm border-0" type="text" id="valor" name="valor" placeholder="Valor" value="">
                                {!! $errors->first('valor', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                            <div class="form-group col-md-4" id="fi_parametro" style="display:none">
                                <label for="parametros_id">Parámetro: </label>
                                <select name="parametros_id" id="parametros_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                    @foreach($parametros as $param)
                                    <option value="{{ $param->id }}">{{ $param->parametro }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('parametros_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>


                        </div>

                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar</button>
                        </div>
                    </form>
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
<script src="{{ asset('js/alertaste/eventos.js') }}">
</script>
@endsection