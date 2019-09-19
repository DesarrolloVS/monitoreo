<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0">
    <title> SISMON </title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('css')

</head>

<body class="as-app-body as-app">
    @include('template.modals')
    <!-- <header class="as-toolbar" style="background: #000;max-heigth:60px;"> -->
    <!-- <header class="as-toolbar"> -->
        @include('template.header')
    <!-- </header> -->

    <as-responsive-content>
        <div id="spinner"></div> 
        @yield('content')
    </as-responsive-content>
        @yield('scripts')
    
</body>

</html>