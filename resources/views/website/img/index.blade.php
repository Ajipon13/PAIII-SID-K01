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
        </div>
      </nav>

<!-- </Nav> -->


<main style="background-color:#F5F5F5;">
  <div class="card">
  <h1><center>Gambar</center></h1>
      <div class="row">
        @foreach($img as $item)
        <div class="col-md-2">
        <div class="card" >
          <img src="storage/img/{{ $item->img }}" width="100%" height="200px" alt="{{$item->desk}}">
          <div class="card-body">
            <p class="card-text">{{$item->desk}}</p>
          </div>
        </div>
        </div>
        @endforeach
      </div>
    </div>
  </main>





@include('website.footer3')
