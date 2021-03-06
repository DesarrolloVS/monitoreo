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
            <h4>Modificar Cliente {{ $cliente->nombre }} </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/cat_clientes">Catálogo Clientes</a></li>
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
                        <form class="bg-white shadow rounded py-3 px-4" action="/cat_clientes/{{ $cliente->id }}" method="POST">
                            <h4 class="text-center"></small></h4>
                            <hr>
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre Empresa: </label>
                                    <input class="form-control shadow-sm border-0 bg-light" type="text" id="nombre" name="nombre" placeholder="Nombre empresa" value="{{ $cliente->nombre }}">
                                    {!! $errors->first('nombre', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="logo">Logo: </label>
                                    <input type="file" class="form-control shadow-sm border-0 bg-light" name="logo">
                                    @if($cliente->logo)
                                    <a href="{{ asset('logos') }}/{{ $cliente->logo }}" class="btn btn-info btn-sm mt-2" target="_blank">Ver Logo</a>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tipopersona_id">Tipo de Persona: </label>
                                    <select name="tipopersona_id" id="tipopersona_id" class="form-control shadow-sm border-0 bg-light">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($tps as $tp)
                                            <option value="{{ $tp->id }}"
                                            @if($cliente->tipopersona_id == $tp->id)
                                            selected
                                            @endif
                                            >{{ $tp->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('tipopersona_id', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rfc">RFC: </label>
                                    <input class="form-control shadow-sm border-0 bg-light" type="text" id="rfc" name="rfc" placeholder="RFC" value="{{ $cliente->rfc }}">
                                   {!! $errors->first('rfc', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tipoempresa_id">Tipo de Empresa: </label>
                                    <select name="tipoempresa_id" id="tipoempresa_id" class="form-control shadow-sm border-0 bg-light">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($tes as $te)
                                            <option value="{{ $te->id }}"
                                            @if($cliente->tipoempresa_id == $te->id)
                                            selected
                                            @endif
                                            >{{ $te->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('tipoempresa_id', '<span class="badge badge-danger">:message</span>') !!}
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="estadocliente_id">Estado cliente: </label>
                                    <select name="estadocliente_id" id="estadocliente_id" class="form-control shadow-sm border-0 bg-light">
                                        <option value="">Seleccione una Opción</option>
                                        @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}"
                                        @if($cliente->estadocliente_id == $estado->id)
                                        selected
                                        @endif
                                        >{{ $estado->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('estadocliente_id', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tiposervicio_id">Tipo de Servicio: </label>
                                    <select multiple name="tiposervicio_id[]" id="tiposervicio_id[]" class="form-control shadow-sm border-0 bg-light">
                                        @foreach($tss as $ts)
                                            <option value="{{ $ts->id }}"
                                            @if(isset($services[$ts->id]))
                                            selected
                                            @endif
                                            >{{ $ts->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('tiposervicio_id', '<span class="badge badge-danger">:message</span>') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                   <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-edit"></i>&ensp;Modificar</button>
                               </div>
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
@endsection