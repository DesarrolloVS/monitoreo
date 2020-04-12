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
            <h5>Estatus Actual: {{ ($gps->estadogpscliente_id == "" ) ? estatus_cliente($gps->estadogpscliente_id) : $gps->estadogpscliente->descripcion }}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{$cliente->id}}/gpsscte">GPS's Cliente</a></li>
                <li class="breadcrumb-item active">Modificar Estatus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                    <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpscliente/{{ $gps->id }}/estatus" method="POST">
                        <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente->id }}">
                        <h4 class="text-center">Modificar Estatus GPS Cliente ( <small>Serie: {{ $gps->serie }}, Imei: {{ $gps->imei }} </small> )</h4>
                        <hr>
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col">
                                <label for="estadogpscliente_id">Cambiar Estado a: </label>
                                <select name="estadogpscliente_id" id="estadogpscliente_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($estados as $estado)
                                    @if($estado->id != $gps->estadogpscliente_id)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('estadogpscliente_id', '<span class="badge badge-danger">:message </span>') !!}
                           </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Modificar</button>
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
@endsection