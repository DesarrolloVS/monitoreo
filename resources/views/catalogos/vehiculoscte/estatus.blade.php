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
            <h4>Estado Actual: {{ ($v->estadovehiculo_id == "" ) ? estatus_vehiculos($v->estadovehiculo_id) : $v->estadovehiculo_id }}</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{ $cliente }}/vehiculoscte"> Vehículos Cliente</a></li>
                <li class="breadcrumb-item active">Modificar Estatus</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                    <form class="bg-white shadow py-3 px-4 rounded" action="/cat_vehiculos/{{ $v->id }}/estatus" method="POST">
                        <hr>
                        @csrf
                        @method('put')

                        <div class="row">
                            <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente }}">
                            <div class="form-group col">
                                <label for="estadogpscliente_id">Cambiar Estado a: </label>
                                <select name="estadovehiculo_id" id="estadovehiculo_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($estados as $estado)
                                    @if($estado->id != $v->estadovehiculo_id)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('estadovehiculo_id', '<span class="badge badge-danger">:message </span>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                            </div>
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
@endsection