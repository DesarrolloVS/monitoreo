@extends('core.mainmapa')

@section('content')
    <!-- Navbar -->
    @include('layouts.mapa.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.admin.sidebar')
    <!-- /.Main Sidebar Container -->
	<div class="content-wrapper">
		@map($puntos)
	</div>

        <!-- Control Sidebar -->
    @include('layouts.admin.controlbar')
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    @include('layouts.admin.footer')

@endsection

@section ('scripts')
@endsection
