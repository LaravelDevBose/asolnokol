<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
      {{-- <img class="img-responsive" src="{{asset('public/backEnd/images/smallLogo.png')}}" alt=""  style="float: left;" /> --}}
      A<b>Vs</b>N


      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        {{-- <img class="img-responsive" src="{{asset('public/backEnd/images/smallLogo.png')}}" alt=""  style="float: left;" /> --}}
        Asol<b> Vs </b>Nokol</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('public/backEnd/images/asolNokol.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li >
                <a style="color:red;" href="{{ url('/admin.logout') }}" class="btn btn-primary"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout
                  </a>
                  <form id="logout-form" action="{{ url('/admin.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                  </form>
              </li>
              
               
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>