@include('website/library')
<!--  <Nav> -->
<header class="bg-white">
      <nav style="background-color:#81BC00; color:#81BC00;">
      .
      </nav>
      <nav class="navbar navbar-expand-lg">
        <div class="col-3">
          <a class="navbar-brand " href="/"><strong class=" text-brand text-info"> DESA NABUNAGE</strong></a>
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


<div class="justify-content">
      <center>
       <h3>DATA SEMENTARA</h3>
      </center>
      <div class="container">
        Jumlah : {{$tamusementara->count()}} orang
      <table class="table table-bordered border-secondary">
  <thead>
    <tr>
    <th>NO</th>
     <th>NIK</th>
     <th>NAMA</th>
     <th>JENIS KELAMIN</th>
     <th>DATANG DARI</th>
     <th>DATANG TANGGAL</th>
     <th>PERGI TANGGAL</th>
     <th>MADSUD & TUJUAN</th>
     <th>KETERAGAN</th>
   <tr>
  </thead>
  <?php $no =1; ?>
  @foreach($tamusementara as $item)
   <tr>
      <td>{{$no++}}</td>
      <td>{{$item->nik_tamu}}</td>
      <td>{{$item->nama_tamu}}</td>
      <td>{{$item->jk_tamu}}</td>
      <td>{{$item->asal}}</td>
      <td>{{$item->tanggal_datang}}</td>
      <td>{{$item->tanggal_balik}}</td>
      <td>{{$item->tujuan}}</td>
      <td>{{$item->ket}}</td>
   </tr>
   @endforeach
  </table>
</div>
</div>
@include('website/footer3')