  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
{{--      <a href="../../index3.html" class="navbar-brand">
         <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Monitoreo</span>
      </a>
 --}}

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>

          {{-- Dropdown1 --}}
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Monitoreo</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/mapaadmin" class="dropdown-item">Mapa </a></li>
              <li><a href="/repoadmin" class="dropdown-item">Reportes</a></li>
              <!-- End Level two -->
            </ul>
          </li>
          {{-- Termina Dropdown1 --}}
      @if(auth()->check())
        @if( auth()->user()->isUserUs(1, 1, 2, ['admin', 'superuser']) )
          {{-- Dropdown2 --}}
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Administración</a>
            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
              <li><a href="/cat_gpsmarcamodelo" class="dropdown-item">Admón. GPS Marca Modelo </a></li>
              <li><a href="/cat_clientes" class="dropdown-item">Admón. Clientes</a></li>
              <li><a href="/cat_parametros" class="dropdown-item">Parámetros</a></li>
              <li><a href="/cat_usuarios" class="dropdown-item">Usuarios</a></li>
            </ul>
          </li>
          {{-- Termina Dropdown2 --}}
          @endif
        @endif

      @if(auth()->check())
        @if( auth()->user()->isUserUs(1, 1, 2, ['admin', 'superuser']) )
          {{-- Dropdown3 --}}
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Catálogos</a>
            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
              <li><a href="/cat_camposgps" class="dropdown-item">ABC GPS Campos</a></li>
              <li><a href="/cat_tipotraza" class="dropdown-item">Tipo de Traza</a></li>
              <li><a href="/cat_estadotrazas" class="dropdown-item">Estado de Traza</a></li>
              <li><a href="/cat_estadogpscliente" class="dropdown-item">Estado GPS Cliente</a>
              <li><a href="/cat_estadosvehiculos" class="dropdown-item">ABC Estados Vehìculos</a></li>
              <li><a href="/cat_tipovehiculos" class="dropdown-item">ABC Tipo de Vehìculo</a></li>
              <li><a href="/cat_estadosusuario" class="dropdown-item">Estados Usuarios</a></li>
              <li><a href="/cat_tipopersonas" class="dropdown-item">ABC Tipo Persona</a></li>
              <li><a href="/cat_tipoempresas" class="dropdown-item">ABC Tipo Empresa</a></li>
              <li><a href="/cat_tiposervicios" class="dropdown-item">ABC Tipo Servicio</a></li>
              <li><a href="/cat_estadoclientes" class="dropdown-item">ABC Estados Clientes</a></li>
              <li><a href="/cat_tipodomicilios" class="dropdown-item">ABC Tipo Domicilios</a></li>
            </ul>
          </li>
          @endif
        @endif

        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

      @if(auth()->check())
            <a href="{{ route('logout') }}" class="dropdown-item"
             onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" >
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
              </form>
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Salir del Sistema
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
      @else
            <a href="{{ route('login') }}" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Ingresar al Sistema
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
      @endif

            <div class="dropdown-divider"></div>
            <a href="/" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Inicio
                    <span class="float-right text-sm text-info"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="/home" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Navegación del Sistema
                    <span class="float-right text-sm text-info"><i class="fas fa-star"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
