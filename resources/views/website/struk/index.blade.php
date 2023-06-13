@include('Website.library')

<!--  <Nav> -->
<header class="bg-white">
<nav style="background-color:#81BC00; color:#81BC00;">.</nav>
      <nav class="navbar navbar-expand-lg">
        <div class="col-3">
          <a class="navbar-brand " href="/"><strong class=" text-brand text-info"> DESA NABUNAGE</strong></a>
        </div>
        <div class="col-6">
          <div class="navbar justify-content-center">
            @include('website.nav')
          </div>
        </div>
        <div class="col-1">
        <!-- <a class="nav-link btn btn-dark btn-sm text-white text-uppercase" href="{{ url('login') }}"><b>login</b></a> -->
        </div>
      </nav>

<!-- </Nav> -->
<h1><center>STRUKTUR ORGANISASI DI DESA </center></h1>

@foreach($gambar as $item)
<h1><center>{{$item->tahun}}</center></h1>
    <div class="container">
      <img src="gambar/{{ $item->gambar }}" class="card-img-top">
    </div>
  <br>
   @endforeach
   @include('website.footer3')
  