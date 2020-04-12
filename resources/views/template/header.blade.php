<nav class="navbar navbar-dark navbar-expand-lg bg-dark">

    <a class="navbar-brand text-light" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <ul class="navbar-nav mr-auto"> -->
        <!-- <ul class="nav nav-pills ml-auto"> -->
        <ul class="nav nav-pills m-auto" id="menues">
            <!-- INICIO -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inicio</a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/">Mapa</a>
                </div>
            </li>
            <!-- MODULO CLIENTES -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/cat_gpsmarcamodelo">Admón. GPS Marca Modelo</a>
                    <a class="dropdown-item" href="/cat_clientes">Admón. Clientes</a>
                    <a class="dropdown-item" href="/cat_parametros">Parametros Generales</a>
                    <a class="dropdown-item" href="/cat_usuarios">Administración Usuarios Propios</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
                    <a class="dropdown-item" href="/cat_camposgps">ABC GPS Campos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cat_estadosvehiculos">ABC Estados Vehìculos</a>
                    <a class="dropdown-item" href="/cat_tipovehiculos">ABC Tipo de Vehículo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cat_tipotraza">ABC Tipo Traza</a>
                    <a class="dropdown-item" href="/cat_estadotrazas">ABC Estados Trazas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cat_estadogpscliente">ABC Estados GPS Cliente</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cat_estadosusuario">ABC Estados Usuarios</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cat_tipopersonas">ABC Tipo Persona</a>
                    <a class="dropdown-item" href="/cat_tipoempresas">ABC Tipo Empresa</a>
                    <a class="dropdown-item" href="/cat_tiposervicios">ABC Tipo Servicio</a>
                    <a class="dropdown-item" href="/cat_estadoclientes">ABC Estados Clientes</a>
                    <a class="dropdown-item" href="/cat_tipodomicilios">ABC Tipo Domicilios</a>
                </div>
            </li>

        </ul>
    </div>

</nav>

@push('scripts')
<script src="{{ asset('js/librerias/jquery.min.js') }}"></script>
<script src="{{ asset('js/nav/events.js') }}"></script>
@endpush