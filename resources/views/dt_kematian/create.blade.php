@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
  <a href="/admin" class="">Dashboard</a>>
   <a href="/kematian" class="">data kematian</a>>
   <a class="">tambah kematian</a>
     <section class="content">

        @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
        
<!-- HALAMAN CREATE DATA WEMILES YIKWA-->
<!-- modal add data -->
<div class="container">
    <form action="{{ route('kematian.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="content ">
          <div class="card">
                  <div class="card-header">
                      <h4 class="modal-title text-center mt-2">Tambah Data Kematian</h4>
                  </div>

            <div class="row container">

              <div class="col-6">
                  <div class="form-group row mt-3">
                    <label for="nama" class="col-sm-2 col-form-label text-sm">Nama</label>
                     <div class="col-sm-10">
                      <input type="name" class="form-control" id="nama_" name="nama_" aria-describedby="nama">
                  </div>
                  </div>
                  <div class="form-group row mt-4">
                      <label for="nik" class="col-sm-2 col-form-label text-sm">Nik</label>
                       <div class="col-sm-10">
                       <input type="name" class="form-control" name="nik" id="nik" aria-describedby="nik" >
                  </div>
                  </div>
                  <label for="tgl_lahir" class="col-12 text-center mt-1">LAHIR</label>
                  <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-2 col-form-label text-sm">Tempat <br> Lahir</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir">
                  </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label text-sm">Tanggal</label>
                  <div class="col-sm-10">
                      <input type="date" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" aria-describedby="tanggal_lahir">
                  </div>
                 </div>
                 </div>
            
            <div class="col-6">

            <div class="form-group row mt-3">
              <div class="col-sm-10">
                <select class="form-control form-control" name="jenis_kelamin">
                  <option placeholder="Apa jenis kelamin"></option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <label for="jenis" class="col-sm-2 col-form-label text-sm">Jenis Kelamin</label>
              </div>

            <label for="tempat_wafaat" class="col-9"> <center>MENINGGAL</center> </label>
                <div class="form-group row">
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tempat_wafaat" name="tempat_wafaat" aria-describedby="tempat_wafaat">
              </div>
              <label for="tempat_wafaat" class="col-sm-2 col-form-label text-sm">Tempat Wafaat</label>
                </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="date" class="form-control datepicker" id="tgl_wafaat" name="tgl_wafaat" aria-describedby="tanggal">
                    </div>
                    <label for="tgl_wafaat" class="col-sm-2 col-form-label text-sm">Tanggal</label>
                </div>
                
                   <div class="form-group row">
                     <div class="col-sm-10">
                       <textarea name="ket" class="form-control" cols="30" rows="10"></textarea>
                       </div>
                       <label for="ket" class="col-sm-2 col-form-label text-sm">Keteragan</label>
                      </div>
            </div>
        </div>
                    <div class="row">
                    <div class="col-md-9"></div>
                      <div class="col-3">
                        <button type="submit" class="btn btn-success btn-bg">SIMPAN</button>
                        <a href="{{ url('kematian')}}" class="btn btn-danger btn-bg">BATAL</a>

                    </div>
                  </div>
        </div>
    </form>
    </div>
          <!--TUTUP CREATE DATA WEMILES YIKWA -->
          </div>
        </div>
  </section>
 </div>
</div>
@include('layouts.footer')

