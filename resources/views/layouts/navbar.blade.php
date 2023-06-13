
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light"  style="background-color:#dffab2; color:#000000;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
     </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user fa-fw"></i>
          <b> {{ Auth::user()->username }}</b>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <ul class="navbarDropdown" aria-labelledby="">
            <center>
            @if(auth())
                @if( Auth::user()->level == 2 )
                      <a class="dropdown-item" href="{{ url('profile', Auth::user()->id)}}"><i class="fa fa-cog " aria-hidden="true"></i>Settings</a>
                  @elseif( Auth::user()->level == 3 )
                      <a class="dropdown-item" href="{{ url('password', Auth::user()->id)}}"><i class="fa fa-cog " aria-hidden="true"></i>Settings</a>
                  @elseif( Auth::user()->level == 1 )
                      <a class="dropdown-item" href="{{ url('change', Auth::user()->id)}}"><i class="fa fa-cog " aria-hidden="true"></i>Settings</a>
                      <a class="dropdown-item" href="{{('/getuser')}}"><i class="fa fa-user " aria-hidden="true"></i>users</a>
                @endif
              <a class="dropdown-item" href="{{url('logout')}}"><i class="fas fa-sign-in"></i>Log Out</a>
            </center> 
            @endif
        </ul>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

