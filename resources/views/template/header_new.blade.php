<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand text-light" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav mr-auto"> -->
            <ul class="nav nav-pills ml-auto">
                <!-- MODULO CLIENTES -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/cat_clientes">ABC Clientes</a>
                        <a class="dropdown-item" href="/cat_parametroscliente">Parametros Cliente</a>
                        <a class="dropdown-item" href="/cat_alertascliente">Alertas Cliente</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/cat_tipopersonas">ABC Tipo Persona</a>
                        <a class="dropdown-item" href="/cat_tipoempresas">ABC Tipo Empresa</a>
                        <a class="dropdown-item" href="/cat_tiposervicios">ABC Tipo Servicio</a>
                        <a class="dropdown-item" href="/cat_estadoclientes">ABC Estados Clientes</a>
                        <a class="dropdown-item" href="/cat_tipodomicilios">ABC Tipo Domicilios</a>

                    </div>
                </li>
                <!-- MODULO USUARIOS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="/cat_usuarios">ABC Usuarios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/cat_estadosusuario">ABC Estados Usuarios</a>
                    </div>
                </li>
                <!-- MODULO gps'S administración-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown4" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">GPS's
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                        <a class="dropdown-item" href="/cat_gpscliente">ABC GPS Cliente</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/cat_estadogpscliente">ABC Estados GPS Cliente</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/cat_gpsmarcamodelo">ABC GPS Marca Modelo</a>
                        <a class="dropdown-item" href="/cat_trazas">ABC Trazas</a>
                        <a class="dropdown-item" href="/cat_gpsalerta">ABC Alertas Gps</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/cat_camposgps">ABC GPS Campos</a>
                        <a class="dropdown-item" href="/cat_tipotraza">ABC Tipo Traza</a>
                        <a class="dropdown-item" href="/cat_estadotrazas">ABC Estados Trazas</a>
                    </div>
                </li>

                <!-- MODULO vEHICULOS Administración-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown5" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vehículos
                    </a>
                        <a class="dropdown-item" href="/cat_vehiculos">ABC Vehículos</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown5">
                        <a class="dropdown-item" href="/cat_estadosvehiculos">ABC Estados Vehìculos</a>
                        <a class="dropdown-item" href="/cat_tipovehiculos">ABC Tipo de Vehículo</a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>