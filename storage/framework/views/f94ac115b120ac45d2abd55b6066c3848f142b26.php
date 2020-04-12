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
      <?php if(auth()->check()): ?>
          <li class="nav-item">
            <li class="nav-item">
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <?php echo e(__('Salir')); ?>

                  </a>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?>
                  </form>
            </li>
          </li>
      <?php else: ?>
        <li class="nav-item">
          <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Ingresar')); ?></a>
          </li>
        </li>
      <?php endif; ?>

      </ul>
    </div>
</nav>
<?php /**PATH /Volumes/Datos_vl/sites/monargento/resources/views/layouts/inicio/nav.blade.php ENDPATH**/ ?>