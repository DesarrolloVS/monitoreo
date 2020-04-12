@extends('core.app')

@section('content')

    <!-- Navbar -->
    @include('layouts.inicio.nav')
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    @include('layouts.inicio.content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('layouts.inicio.controlbar')
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    @include('layouts.inicio.footer')

@endsection


