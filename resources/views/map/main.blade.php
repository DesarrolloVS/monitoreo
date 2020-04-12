@extends('core.appmap')

@section('content')
    @include('layouts.admin.nav')
    @include('layouts.admin.sidebar')

  <div class="content-wrapper">
    <section class="content">
      <div class="card card-solid">
        <div class="card-body">

{{--             <main class="as-main" data-tab-order="0" data-name="Mapa">
           <div class="as-map-area">
--}}
                <div id="search-visor" class="search-visor">
                    <div class="search-visor-form" style="display: block">
                        <div id="search" class="input-group bg-white">
                            <span id="algo" class="input-group-addon d-flex align-items-center px-3 border-bottom border-left bg-light">dirección:</span>
                            <input type="text" id="txtDireccion" name="txtDireccion" placeholder="p. ej. Calle, número, colonia" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div id="map"></div>

                <div class="btn-group-vertical options" role="group">
                    <a class="btn btn-info" id="geo_cerca" data-toggle="tooltip" data-placement="right" title="Agregar Geocerca"><i class="fas fa-vector-square"></i></a>
                    <a class="btn btn-info" id="control_punto" data-toggle="tooltip" data-placement="right" title="Agregar Punto de Control"><i class="fas fa-bezier-curve"></i></a>
                </div>
{{--             </div>
        </main>
 --}}
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

@include('librerias.google')

@section ('scripts')
    <script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
    <script src="{{ asset('js/nav/events.js') }}"></script>

    <script src="{{ asset('js/librerias/google.js') }}"></script>

    <script src="{{ asset('js/librerias/jquery.min.js') }}"></script>

    <!-- JS NOTIFICACIONES ANIMATE -->
    <script type="text/javascript" src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template/functionsGeo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template/constants.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template/constantsLayers.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/template/events.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/template/eventsModal.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="{{ asset('js/librerias/pushbar.js') }}"></script>
    <script>
        var pushbar = new Pushbar({
            blur: true,
            overlay: true
        });
    </script>

    <script type="text/javascript" src="{{ asset('js/template/main.js') }}"></script>
@endsection