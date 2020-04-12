<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Monitoreo</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Inicia CSS -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:300,400,600" rel="stylesheet">
    <!-- Include Airship -->
    <link rel="stylesheet" href="https://libs.cartocdn.com/airship-style/v2.0.5/airship.css">
    <script src="https://libs.cartocdn.com/airship-components/v2.0.5/airship.js"></script>
    <!-- Include Leaflet -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" rel="stylesheet">
    <!-- Include Draw -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.13/leaflet.draw.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.13/leaflet.draw.css" />
    <!-- Include CARTO.js -->
    <script src="https://libs.cartocdn.com/carto.js/v4.1.2/carto.min.js"></script>
    <link href="https://carto.com/developers/carto-js/examples/maps/public/style.css" rel="stylesheet">
    <!-- Include Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- INICIO DE MIS ESTILOS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/template/thisSystem.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}"> -->
    <!-- CSS NOTIFICACIONES ANIMATE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate/animate.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('css/pushbar/pushbar.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/template/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template/botons.css') }}">
    <!-- TURF -->
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>

    <!-- Finalizaa CSS -->


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="spinner"></div>
    <as-responsive-content>
        @yield('content')
    </as-responsive-content>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @stack('extra_scripts')
    @yield('scripts')

</body>

</html>
