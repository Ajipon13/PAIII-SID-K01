<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Surat Kelakuan Baik</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="row header">
              <div class="col-1">
              </div>
              <div class="col-2"></div>
              <div class="col-9 ">
            <div class="row ">
              <div class="col-12">
                <h3>PEMERINTAH KABUPATEN </h3>
                <h3 class="mt-3">TOLIKARA</h3>
                <h4 class="mt-3">DINAS KOMUNIKASI DAN INFORMASI</h4>
                <h6 class="mt-3">Jln.Trans.Papua No.01 wenam telp.083782642</h6>
              </div>
            </div>
              </div>
        </div>

        <hr style="height:3px; border-width:0; color:gray; background-color:gray;">
        <h2 class="mb-3">Surat Kelakuan Baik</h2>
        <small class="mb-1">No/{{$surat->no}}</small>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <p>Nama: {{$surat->nama}}</p>
        <p>Alamat: {{$surat->alamat}}</p>
        <p>Pekerjaan: {{$surat->pekerjaan}}</p>
      </div>
      <div class="col-md-6">
        <p>Tanggal Lahir: {{$surat->tgl_lahir}}</p>
        <p>Agama: {{$surat->agama}}</p>
        <p>Status Perkawinan: {{$surat->status_perkawinan}}</p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12">
        <p>Surat ini diberikan kepada:</p>
        <p>Nama:</p>
        <p>Alamat:</p>
        <p>NIK:</p>
        <p>{{$surat->keperluan}}</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-6">
        <p>Desa XYZ, tanggal:</p>
        <p>Kepala Desa XYZ</p>
        <br>
        <br>
        <p><strong><u>Nama Kepala Desa</u></strong></p>
      </div>
      <div class="col-md-6 text-right">
        <p>Tanda Tangan:</p>
        <img src="ttd-kepala-desa.png" alt="Tanda Tangan Kepala Desa">
      </div>
    </div>
  </div>
</body>
</html>
