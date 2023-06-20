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
        </div>
      </nav>
</header>


<div class="justify-content">
      <center>
       <h3>DATA PEGAWAI DESA</h3>
      </center>
      <div class="container">
      <table class="table table-bordered border-secondary">
  <thead>
    <tr>
     <th>NO</th>
     <th>NAMA</th>
     <th>JENIS KELAMIN</th>
     <th>AGAMA</th>
     <th>JABATAN</th>
     <th>PENDIDIKAN</th>
   <tr>
  </thead>
  <?php $no =1; ?>
  @foreach($pegawai as $item)
      <tr>
           <td>{{$no ++}}</td>
           <td>{{$item->nama_staf}}</td>
           <td>{{$item->jenisk_staf}}</td>
           <td>{{$item->agama_staf}}</td>
           <td>{{$item->pekerjaan_staf}}</td>
           <td>{{$item->pendidikan_staf}}</td>
      </tr>
   @endforeach
  </table>
</div>
</div>
@include('website/footer3')