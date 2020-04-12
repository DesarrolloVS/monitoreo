@extends('core.main')

@section('content')

    <!-- Navbar -->
    @include('layouts.admin.nav')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    @include('layouts.admin.sidebar')
    <!-- /.content-wrapper -->


    <!-- Content Wrapper. Contains page content -->
    @include('layouts.admin.content')
    <!-- /.content-wrapper -->

    <!-- Admin Footer -->
    @include('layouts.admin.footer')

    <!-- Control Sidebar -->
    @include('layouts.admin.controlbar')
    <!-- /.control-sidebar -->


@endsection
