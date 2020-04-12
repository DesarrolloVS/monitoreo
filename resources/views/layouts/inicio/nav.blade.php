  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="http://monitoreo.test" class="navbar-brand">
        <img src="/img/monitoreo.jpg" alt="Monitoreo Satelital" class="brand-image"
             style="opacity: .8">
      </a>


      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
      @if(auth()->check())
          <li class="nav-item">
            <li class="nav-item">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Salir') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                  </form>
            </li>
          </li>
      @else
        <li class="nav-item">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
          </li>
        </li>
      @endauth

      </ul>
    </div>
</nav>
