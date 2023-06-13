@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
    <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a class="" href="{{ url('staff')}}">index pegawai</a>>
            <a class="">tambah pegawai</a>
            </ol>
          </div>
    <form action="{{ route('staff.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div class="card">
          <div class="catd-header">
               <h4 class="text-center mt-2">Tambah Data Staf Desa</h4>
               <hr>
          </div>
                 
          <div class="card-body">
            <div class="row">

              <div class="col-6">
                <div class="form-group row">
                  <div class="col-2">
                    <label for="nik_staf">Nik</label>
                  </div>
                  <div class="col-10">
                    <input type="name" class="form-control" name="nik_staf" id="nik_staf">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-2">
                    <label for="nama">Nama</label>
                  </div>
                  <div class="col-10">
                    <input type="name" class="form-control" id="nama_staf" name="nama_staf">
                  </div>
                </div>
            
                <div class="form-group row">
                  <div class="col-2">
                    <label for="jenisk_staf">Jenis Kelamin</label>
                  </div>
                  <div class="col-10">
                    <select class="form-control form-control" name="jenisk_staf">
                          <option placeholder="Apa jenis kelamin"></option>
                          <option>Laki-laki</option>
                          <option>Perempuan</option>
                    </select>
                  </div>
                </div>

            </div>
            
            <div class="col-6">
                <div class="form-group row">
                  <div class="col-10">
                    <input type="text" class="form-control" id="agama_staf" name="agama_staf" aria-describedby="tempat_wafaat">
                  </div>
                  <div class="col-2">
                    <label for="agama_staf">Agama</label>
                  </div>
                </div>

                  <div class="form-group row">
                  <div class="col-10">
                    <input type="text" class="form-control datepicker" id="pekerjaan_staf" name="pekerjaan_staf" >
                  </div>  
                    <div class="col-2">
                      <label for="pekerjaan_staf">Jabatan</label>
                    </div>     
                </div>

                <div class="form-group row">
                  <div class="col-10">
                    <input type="text" class="form-control datepicker" id="pendidikan_staf" name="pendidikan_staf" >
                  </div>
                  <div class="col-2">
                    <label for="pendidikan_staf">Pendidikan Terakhir</label>
                  </div>
                </div>

              </div>
            </div>
        </div>
                    <div class="row">
                    <div class="col-md-10"></div>
                      <div class="col-2 mt-4">
                        <a href="{{ url('staff')}}" class="btn btn-danger btn-bg ">BATAL</a>
                      <button type="submit" class="btn btn-success btn-bg ">SIMPAN</button>
                      <div class="mt-3"></div>
                    </div>
                  </div>
    </form>
</div>
</div>
</div>
@include('layouts.footer')
