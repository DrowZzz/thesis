<nav class="navbar p-0 fixed-top d-flex flex-row" style="background-color: #F0EBED">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center " style="background-color: #F0EBED">
    <a class="navbar-brand brand-logo-mini" href="{{ url('/redirect') }}"><img src="/images/mini-logo.png" alt="logo" alt="logo" style="width: 50px"/></a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #F0EBED">
      <a class="navbar-brand brand-logo"  href="{{ url('/redirect') }}"><img class="w-full h-full" src="/images/logo.png" alt="logo" alt="logo" style="width: 50px"/></a>
    </div>

    <ul class="navbar-nav w-100">
    </ul>
    <ul class="navbar-nav navbar-nav-right">
  
      <li class="nav-item nav-settings d-none d-lg-block">
        <a class="nav-link" href="#">
          <i class="mdi mdi-view-grid" style="color: black"></i>
        </a>
      </li>

      <li class="">
       <x-app-layout>
       </x-app-layout>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>