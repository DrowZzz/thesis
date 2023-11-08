<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #F0EBED">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background-color: #F0EBED">
      <a class="sidebar-brand brand-logo" href="{{ url('/redirect') }}"><img src="/images/logo.png" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{ url('/redirect') }}"><img src="/images/mini-logo.png" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/redirect') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('/users_manage')}}">Manage Users</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/users_addform')}}">Add Users</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/donation')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Manage Donations</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('/products_addform')}}"> Add Products </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/products_manage')}}"> Manage Products</a></li>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/orderlist')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Manage Orders</span>
        </a>
      </li>
    </ul>
  </nav>