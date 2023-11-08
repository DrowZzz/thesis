<div class="az-header">
    <div class="container">
      <div class="az-header-left">
        <a href="/" class="az-logo"><span> <img src="/images/logo.png" class="w-20 h10"/></span></a>
        <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      </div><!-- az-header-left -->
      <div class="az-header-menu">
        <div class="az-header-menu-header"> 
          <a href="" class="az-logo"><span></span> azia</a>
          <a href="" class="close">&times;</a>
        </div><!-- az-header-menu-header -->
        <ul class="nav">
          <li class="nav-item">
            <a href="{{  url('/userhome') }}" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub "><i class="typcn typcn-document"></i> Donations</a>
            <nav class="az-menu-sub">
              <a href="{{ url('/makedonation') }}" class="nav-link">Make Donation</a>
              <a href="{{ url('/donationhistory') }}" class="nav-link">History</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="{{  url('/productlist') }}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>Shop</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/userprofile') }}" class="nav-link"><i class="typcn typcn-book"></i>Profile</a>
          </li>
        </ul>
      </div><!-- az-header-menu -->
      <div class="az-header-right">
        <div class="az-header-message mr-3">
          <a href="{{ url('/mycart') }}"><i class="typcn typcn-shopping-cart"></i></a>
        </div><!-- az-header-cart -->
        <div class="az-header-message">
          <a href="#"><i class="typcn typcn-messages"></i></a>
        </div><!-- az-header-message -->
        <div class="dropdown az-header-notification">
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <p class="az-notification-text">You have 2 unread notification</p>
            <div class="az-notification-list">
              <div class="media new">
                <div class="az-img-user"><img src="../img/faces/face2.jpg" alt=""></div>
                <div class="media-body">
                  <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                  <span>Mar 15 12:32pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media new">
                <div class="az-img-user online"><img src="../img/faces/face3.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Joyce Chua</strong> just created a new blog post</p>
                  <span>Mar 13 04:16am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="./user/img/faces/face4.jpg" alt=""></div> 
                <div class="media-body">
                  <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                  <span>Mar 13 02:56am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="./user/img/faces/face5.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                  <span>Mar 12 10:40pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div><!-- dropdown-menu -->
        </div><!-- az-header-notification -->
        <div class="">
          <x-app-layout>
          </x-app-layout>
        </div>
      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->