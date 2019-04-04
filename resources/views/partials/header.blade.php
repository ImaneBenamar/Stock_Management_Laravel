<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal" >
  <div class="md-content" style="background-color:#1fad83">
    <h3><strong>Logout</strong> Confirmation</h3>
    <div>
      <p class="text-center">Are you sure you want to logout?</p>
      <p class="text-center">
      <button class="btn btn-danger md-close">No!</button>
      <a href="{{ route('get_logout') }}" class="btn btn-success md-close">Yes, I'm sure</a>
      </p>
    </div>
  </div>
</div>

<!-- Modal End -->

<div class="topbar">

    <div class="topbar-left">
        <div class="logo">
            <h1><a href="{{ route('home.dashboard') }}"><img src="{{ URL::to('assets/img/ibestock.png')}}" alt="Logo"></a></h1>
        </div>
        <button class="button-menu-mobile open-left">
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">
                <ul class="nav navbar-nav navbar-right top-navbar">
                <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="{{ URL::to('images/users/user-35.jpg')}}"></span> <strong> {{{Auth::user()->name}}} </strong> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="right-opener">
                        <a href="javascript:;" class="open-right"><i class="fa fa-angle-double-left"></i><i class="fa fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
