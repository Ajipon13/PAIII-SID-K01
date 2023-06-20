@include('website/library')
<!--  <Nav> -->
<header class="bg-white">
      <nav style="background-color:#81BC00; color:#81BC00;">
      wenam
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


<div class="justify-content mt-2">
    <center>
      <h3>DATA INDUK</h3>
    </center>
  <div class="container">
  Jumlah : {{$tampilpenduduk->count()}} penduduk

    <table class="table table-bordered container border-secondary">
      <thead>
        <tr>
          <th>NO</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>JENIS KELAMIN</th>
          <th>AGAMA</th>
          <th>STATUS PERKAWINAN</th>
          <th>PEKERJAAN</th>
          <th>DUSUN</th>
          <th>RT</th>
          <th>RW</th>
          <th>TEMPAT LAHIR</th>
          <th>TANGGAL LAHIR</th>
        </tr>
      </thead>
      <tbody>
          <?php $n = 1; ?>
        @foreach($tampilpenduduk as $item)
          <tr>
            <td>{{$n++}}</td>
            <td>{{$item->nik_penduduk}}</td>
            <td>{{$item->nama_penduduk}}</td>
            <td>{{$item->jk_penduduk}}</td>
            <td>{{$item->agama_penduduk}}</td>
            <td>{{$item->status_nikah}}</td> 
            <td>{{$item->pekerjaan_penduduk}}</td>
            <td>{{$item->dusun_penduduk}}</td>
            <td>{{$item->tr_penduduk}}</td>
            <td>{{$item->rw_penduduk}}</td>
            <td>{{$item->tempat_lahir_penduduk}}</td>
            <td>{{$item->tanggal_lahir_penduduk}}</td>
          </tr>
        @endforeach
      </tbody>
      </table>
  </div>
</div>
@include('website/footer3')
