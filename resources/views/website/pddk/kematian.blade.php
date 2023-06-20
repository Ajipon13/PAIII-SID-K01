@include('website/library')
<!--  <Nav> -->
<header class="bg-white">
      <nav style="background-color:#81BC00; color:#81BC00;">
      .
      </nav>
      <nav class="navbar navbar-expand-lg">
        <div class="col-3">
          <a class="navbar-brand " href="/"><strong class=" text-brand text-info">INFORMASI DESA</strong></a>
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
          <h3>KEMATIAN</h3>
      </center>
      <div class="container">
        Jumlah : orang
  <table class="table table-bordered border-secondary">
      <thead>
          <th colspan="4"></th>
          <th colspan="2" class="text-center">LAHIR</th>
          <th colspan="2" class="text-center">MENINGGAL</th>
      </thead>
        <tr>
    <thead>
        <th rowspan="3">NO</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>JENIS KELAMIN</th>
        <th>TEMPAT</th>
        <th>TANGGAL</th>
        <th>TEMPAT</th>
        <th>TANGGAL</th>
        <th colspan="2">KETERAGAN</th>
     <tr>
    </thead>
    <?php $no =1;?>
   @foreach($kematian as $item)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$item->nik}}</td>
      <td>{{$item->nama_}}</td>
      <td>{{$item->jenis_kelamin}}</td>
      <td>{{$item->tempat_lahir}}</td>
      <td>{{$item->tgl_lahir}}</td>
      <td>{{$item->tempat_wafaat}}</td>
      <td>{{$item->tgl_wafaat}}</td>
      <td>{{$item->ket}}</td>
    </tr>
   @endforeach
  </table>
</div>
</div>
@include('website/footer3')