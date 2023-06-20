<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Desa Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="bg-white">
      <nav style="background-color:#81BC00; color:#81BC00;">
      wenam
      </nav>
      <nav class="navbar navbar-expand-lg">
        <div class="col-3">
          <a class="navbar-brand " href="/"><strong class=" text-brand text-info">INFORMASI DESA</strong></a>
        </div>
        <div class="col-8">
          <div class="navbar justify-content-center">
            @include('website.nav')
          </div>
        </div>
        <div class="col-1">
        <a class="nav-link btn btn-dark btn-sm text-white text-uppercase" href="{{ url('login') }}"><b>login</b></a>
        </div>
      </nav>

</header>

<main class="mt-5">
  <div class="text-center text-white mt-5">
    <b class=" font-weight-bold " style="font-family:Segoe Print; font-size: 44px;"> <br><br><br> SELAMAT DATANG DI WEBSITE <br>INFORMASI DESA</b>
  </div>
</main>
  
@include('website.footer')

@include('website.l2')
  </body>
</html>
