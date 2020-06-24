<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URL_ROOT; ?>">
    <div class="sidebar-brand-icon">
      <img
        src="<?php echo URL_ROOT; ?>/assets/images/isologo-uamericana-white.png"
        height="40"
        alt="Universidad Americana"
      >
    </div>
    <img
      class="sidebar-brand-text"
      src="<?php echo URL_ROOT; ?>/assets/images/logo-uamericana-white.png"
      height="40"
      alt="Universidad Americana"
    >
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo URL_ROOT; ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Tablero</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Admin
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-list"></i>
      <span>Modulos</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Bases de Datos:</h6>
        <a class="collapse-item" href="<?php echo URL_ROOT; ?>">Entidades</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Sesión de Usuario:</h6>
        <a class="collapse-item" href="<?php echo URL_ROOT; ?>">Salir</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>