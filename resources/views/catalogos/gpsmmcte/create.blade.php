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
            <h4>Agregar GPS  Marca - Modelo Cliente</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes/{{$cliente->id}}/gpsmmcte">GPS's MM Cliente</a></li>
                <li class="breadcrumb-item active">Agregar Registro <span id="cliente_nombre1">{{ $cliente->nombre }}</span> </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <form class="bg-white shadow rounded py-3 px-4" action="/cat_gpsmmcte" method="POST">
                    <hr>
                    @csrf
                    <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $cliente->id }}">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="gpsmarcamodelo_id">Marca - Modelo: </label>
                            <select name="gpsmarcamodelo_id" id="gpsmarcamodelo_id" class="form-control bg-light shadow-sm border-0">
                                <option value="">Seleccione una Opción</option>
                                @foreach($gpsmm as $m)
                                <option value="{{ $m->id }}">{{ $m->marca }} - {{ $m->modelo }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('gpsmarcamodelo_id', '<span class="badge badge-danger">:message </span>') !!}
                        </div>

                    </div>

                    <div class="text-center" id="submit_form" >
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
@endsection