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
            <h4>Modificar Registro</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{$cliente_id}}/gpsscte">GPS's Cliente</a></li>
                <li class="breadcrumb-item active">Modificar Registro</li>
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
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpscliente/{{ $gps->id }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente_id }}">

                        <div id="datos_gps">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                                    <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($mm as $m)
                                        <option value="{{ $m->id }}"
                                        @if($m->id == $gps->gpsmarcamodelo_id)
                                        selected
                                        @endif
                                        >{{ $m->marca }} - {{ $m->modelo }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('gpsmarcamodelo_id', '<span class="badge badge-danger">:message </span>') !!}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="serie">Serie: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="serie" name="serie" placeholder="Serie" value="{{ $gps->serie }}">
                                    {!! $errors->first('serie', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="paterno">Imei: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="imei" name="imei" placeholder="Imei" value="{{ $gps->imei }}">
                                    {!! $errors->first('imei', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="puerto">Puerto: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="puerto" name="puerto" placeholder="Puerto" value="{{ $gps->puerto }}">
                                    {!! $errors->first('puerto', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sincronizacion">Sincronización: </label>
                                    <input class="form-control bg-light shadow-sm border-0" type="text" id="sincronizacion" name="sincronizacion" placeholder="Sincronización" value="{{ $gps->sincronizacion }}">
                                    {!! $errors->first('sincronizacion', '<span class="badge badge-danger">:message </span>') !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center" id="submit_form">
                            <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section ('scripts')
@endsection