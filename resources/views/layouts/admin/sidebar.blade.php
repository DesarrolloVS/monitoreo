
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
{{--       <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
           --}}
      <span class="brand-text font-weight-light">Monitoreo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{--
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

    </div>
    <!-- /.sidebar -->
  </aside>