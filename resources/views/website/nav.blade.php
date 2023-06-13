 <style>
      .dropdown:hover>.dropdown-menu {
      display: block;
    }
  .dropdown-item:hover>.dropdown-menu {
      display: block;
    }
ul li{
     list-style-type:none;
      display: inline;
    }

.navbar-nav .nav-link{display:inline-block;}
   
.ml-auto {
      display:inline-block!important;
      }

.dropdown>.dropdown-toggle:active {
      pointer-events: none;
    }
 </style>

 <!-- ======= Header/Navbar ======= -->
 <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">

      <div class="navbar-collapse collapse justify-content-center" >
        <ul class="navbar-nav collapse navbar-collapse">
          <li class="nav-item">
            <a class="nav-link active" href="/">BERANDA</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TENTANG DESA</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="{{ url('profile') }}">Profile Desa</a>
              <a class="dropdown-item " href="{{ url('struktur') }}">Struktur Organisasi Desa</a>
              <div class="navbar-collapse text-center" id="navbarResponsive">
          <ul class="navbar">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Data Penduduk Desa
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ url('dataindeuk') }}">Penduduk Induk</a>
                <a class="dropdown-item" href="{{url('datasementara')}}">Penduduk Sementara</a>
                <a class="dropdown-item" href="{{url('datakemat')}}">Kematian</a>
                <a class="dropdown-item" href="{{url('staffdesa')}}">Staff Desa</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      </li>
        
          <li class="nav-item">
            <a class="nav-link " href="{{ url('pddk') }}">INFORMASI</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ url('galeris') }}">GALERY</a>
          </li>

        </ul>
      </div>

    </div>
  </nav>