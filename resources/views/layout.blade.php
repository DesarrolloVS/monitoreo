<!DOCTYPE html>
<!-- <html lang="en"> -->
<html>
<head>
    <!-- <title>//@yield('title','Aprendible')</title> -->
    <title>Monitoreo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Open+Sans:300,400,600" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
        </header>
        <!-- @//include('partials.session-status') -->
        <main class="pt-0 pb-4">
            @yield('content')
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow">
        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    @yield('scripts')
    
</body>
</html>