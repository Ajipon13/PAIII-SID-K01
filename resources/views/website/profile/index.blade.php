@include('website/library')
<!--  <Nav> -->
<header class="bg-white">
      <nav style="background-color:#81BC00; color:#81BC00;">
      .
      </nav>
      <nav class="navbar navbar-expand-lg">
        <div class="col-3">
          <a class="navbar-brand " href="/"><strong class=" text-brand text-info">INFORMASI DESA </strong></a>
        </div>
        <div class="col-7">
          <div class="navbar justify-content-center">
            @include('website.nav')
          </div>
        </div>
        <div class="col-1">
        <!-- <a class="nav-link btn btn-dark btn-sm text-white text-uppercase" href="{{ url('login') }}"><b>login</b></a> -->
        </div>
      </nav>
</header>

<!-- </Nav> -->

<div class="justify-content">
      <center >
            <h1>PROFILE DESA</h1>
      <div class="row container">
            @foreach($profile as $item)
            <div class="col-4">
                  <img src="storage/profile_img/{{ $item->profile_img }}" style="width:400px; height:300px;">
            </div>
            <div class="col-8">
               {{$item->profile_desa}}
            @endforeach
            </div>
      </div>
      </center>
</div>
@include('website/footer3')
