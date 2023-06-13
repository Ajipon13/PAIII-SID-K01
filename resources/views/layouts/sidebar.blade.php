  <!-- Main Sidebar Container -->
  <link href="/your_path_to_version_6_compiled_files/css/fontawesome.css" rel="stylesheet">
  <aside class="main-sidebar sidebar-dark-primary" style="background-color:#81bc00;">
    <!-- Brand Logo -->
        <div class="text-content">
          <div class="col-6">
            <span class="brand-text font-weight-light">
              @if(auth()->user()->level=='1')
              <a href="{{('/Dashboard/admin')}}" class="text-white" styele="background-color:#81bc00;">
                <div class="row">
                <div class="col-6">
                <img src="{{ asset('storage/image/'.Auth::user()->image) }}" class="rounded-circle" alt="Profile Image" style="max-width: 50px; height: 50px;">
                  </div>
                    <div class="col-6 mt-2">
                    Admin
                    </div>
                  </div>
               </a>
              @elseif(auth()->user()->level=='2')
              <a href="{{('/Dashboard/desa')}}" class="text-white" styele="background-color:#81bc00;">
                  <div class="row">
                        <div class="col-4">
                            <img src="{{ Storage::url(Auth::user()->image) }}" class="rounded-circle" alt="Foto Anda" style="max-width: 40px; height: 50px;" >
                        </div>
                        <div class="col-6 mt-2" style="white-space: nowrap;">
                          Kepala Desa
                        </div>
                  </div>
              </a>
              @endif
            </span>
          </div>
        </div>

    <!-- Sidebar -->
    <div class="sidebar mt-1" style="background-color:#294635;">

      <!-- Sidebar Menu -->
      <nav>
        <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <li class="nav-item has-treeview menu-open">
            <a href="{{('/Dashboard/desa')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p class="text-sm">
                Dashboard
              </p>
            </a>
          </li>

          @if(auth()->user()->level==1)
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa fa-users" aria-hidden="true"></i>
                <p class="text-xs">
                  Kependudukan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview " style="background-color: #E2EFE8;">
              <li class="nav-item ">
                    <a href="{{ url('penduduk')}}" class="nav-link">
                      <p class="text-xs text-dark">Data Penduduk Induk</p>
                    </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('indextamu') }}" class="nav-link">
                  <p class="text-xs text-dark ">Data Penduduk Sementara</p>
                </a>
              </li>
              <li class="nav-item">
    
                <a href="{{ url('/kematian') }}" class="nav-link">
                  <p class="text-xs text-dark">Data Kematian</p>
                </a>
                
                
                
              </li>
            </li>
          </ul>
          @endif            
          </li>

          @if(auth()->user()->level==2)
            <li class="nav-item has-treeview">
                  <a href="{{ url('reguestsurat') }}" class="nav-link">
                    <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                    <p class="text-xs">
                      Layanan Surat
                    </p>
                  </a>
                  <li class="nav-item has-treeview">
                  <a href="{{ url('pegawaidesa') }}" class="nav-link">
                    <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                    <p class="text-xs">
                      Data Staff Desa
                    </p>
                  </a>
                </li>
          @endif

            @if(auth()->user()->level==1)
              <li class="nav-item has-treeview">
                <a href="{{ url('pjs') }}" class="nav-link">
                <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
                  <p class="text-xs">
                    Mengelola Layanan Surat
                  </p>
                </a>
              </li>
          
              <li class="nav-item has-treeview">
                <a href="{{ url('staff') }}" class="nav-link">
                  <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                  <p class="text-xs">
                    Mengelola Data Staff Desa 
                  </p>
                </a>
              </li>
          
          
              <li class="nav-item">
                <a href="{{ url('strukt') }}" class="nav-link text-xs">
                  <i class="nav-icon fa fa-bezier-curve"></i>
                  <p>Struktur Organisasi Desa</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ url('getuser') }}" class="nav-link">
                <!-- <i class="  fa fa-users-line"></i> -->
                <i class="nav-icon fa fa-user-cog" aria-hidden="true"></i>
                  <p class="text-sm"> Mengelola Users</p>
                </a>
              </li> 
              <i class="fa fa-usd" aria-hidden="true"></i>

              <li class="nav-item has-treeview">
                <a href="{{ url('galeri')}}" class="nav-link">
                  <i class="nav-icon fas fa-image"></i>
                  <p class="text-xs">
                  Mengelola Galeri
                  </p>
                </a>
              </li>
            
              <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                          <p class="text-xs">
                          Mengelola Data Tanah
                          <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>

                  <ul class="nav nav-treeview " style="background-color: #E2EFE8;">
                      <li class="nav-item">
                        <a href="{{ url('tanah') }}" class="nav-link text-sm">
                            <p class="text-xs text-dark"> Kepemilikan Tanah</p>
                        </a>
                    </li>
          
                    <li class="nav-item">
                      <a href="{{ url('t_usaha') }}" class="nav-link text-xs">
                        <p class="text-xs text-dark">Tempat Usaha</p>
                      </a>
                    </li>
                  </ul>
                </li>

            @endif
          @if(auth()->user()->level=='1')
          <li class="nav-item has-treeview">
                <a href="{{ url('profil') }}" class="nav-link text-sm">
              <i class="nav-icon fas fa-copy text-sm"></i>
                  <p class="text-xs">Profil Desa</p>
                </a>
              </li>
          @endif

  
        @if(auth()->user()->level=='2')
        <li class="nav-item has-treeview">
              <a href="{{ url('t') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                  <p class="text-xs">
                  Data Tanah
                  <i class="fas fa-angle-left right"></i>
                  </p>
              </a>

                <ul class="nav nav-treeview " style="background-color: #E2EFE8;">
                    <li class="nav-item">
                      <a href="{{ url('t') }}" class="nav-link text-sm">
                          <p class="text-xs text-dark"> Kepemilikan Tanah</p>
                      </a>
                    </li>
            
                    <li class="nav-item">
                      <a href="{{ url('u') }}" class="nav-link text-xs">
                        <p class="text-xs text-dark">Tempat Usaha</p>
                      </a>
                    </li>
                </ul>
        </li>
        @endif

        @if(auth()->user()->level=='1')
        <li class="nav-item">
          <a href="{{ url('pgmn')}}" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>Pengumuman</p>
          </a>
        </li>
        @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
     <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
     <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
  </svg>