@include('Website.library')

<!--  <Nav> -->
<header class="bg-white">
<nav style="background-color:#81BC00; color:#81BC00;">
      .
      </nav>
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
        <!-- <a class="nav-link btn btn-secondary btn-sm text-white text-uppercase" href="{{ url('login') }}"><b>login</b></a> -->
        </div>
      </nav>

<!-- </Nav> -->
<div class="content-wrapper">
   <div class="content">
      <section class="container">
        <!-- <div class="card "> -->
               <h3 class="text-bold container mt-2">{{$penguman->judul}}</h3> <hr>
            <div class="card-body">
               <samp>{{$penguman->deskripsi}}</samp>
            </div>
            <div class="container">
               Salam
                 
               <hr>
               {{$penguman->tanggal}}
            </div>
        <!-- </div>  -->
       </section>
     </div>
</div>
@include('website.footer2')
