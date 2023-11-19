<div class="az-header">
    <div class="container">
      <div class="az-header-left">
        <a href="/" class="az-logo"><span> <img src="/images/logo.png" class="w-20 h10"/></span></a>
        <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      </div><!-- az-header-left -->
      <div class="az-header-menu">
        <div class="az-header-menu-header"> 
          <a href="" class="az-logo"><span></span> GR </a>
          <a href="" class="close">&times;</a>
        </div><!-- az-header-menu-header -->
        <ul class="nav">
          <li class="nav-item">
            <a href="{{  url('/userhome') }}" class="nav-link"><i class="typcn typcn-th-small"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub "><i class="typcn typcn-document"></i> Donations</a>
            <nav class="az-menu-sub">
              <a href="{{ url('/makedonation') }}" class="nav-link">Make Donation</a>
              <a href="{{ url('/donationhistory') }}" class="nav-link">History</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="{{  url('/productlist') }}" class="nav-link"><i class="typcn typcn-coffee "></i>Shop</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/userprofile') }}" class="nav-link"><i class="typcn typcn-user"></i>Profile</a>
          </li>
        </ul>
      </div><!-- az-header-menu -->
      <div class="az-header-right">
        <div class="az-header-message mr-3">
          <a href="{{ url('/mycart') }}"><i class="typcn typcn-shopping-cart"></i></a>
        </div><!-- az-header-cart -->
        <div class="">
          <x-app-layout>
          </x-app-layout>
        </div>
      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->