@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
  <section class="content">
      <div class="col-sm-12">
      <ol class="breadcrumb float-sm">
      <a href="{{ url('Dashboard/admin')}}" class="">Dashboard</a>>
      <a href="/penduduk" class="">index penduduk</a>>
      <a class="">tambah penduduk</a>
      </ol>
    </div>
    <div class="card">
          <div class="card-header text-center text-bold">
            Tambah Data Penduduk Baru
           </div>
     <form action="{{ route('penduduk.store') }}" method="POST" enctype="multipart/form-data" class="mt-2">
        @csrf
        @method('POST')
    
             <div class="row">

                 <div class="col">
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-sm" >Nik</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control" autofocus name="nik_penduduk" id="nik" value="{{ old('nik_penduduk') }}" class="form-control @error('nik_penduduk') is-invalid @enderror">
                         @error('nik_penduduk')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                     </div>
                    </div>

              <div class="form-group  row">
                  <label for="nama" class="col-sm-2 col-form-label text-sm">Nama</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control" id="nama" name="nama_penduduk" aria-describedby="namalHelp">
                  </div>
              </div>
            
              <div class="form-group row">
                  <label for="jenis" class="col-sm-2 col-form-label text-sm">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <select class="form-control form-control" name="jk_penduduk">
                        <option placeholder="Apa jenis kelamin"></option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
              </div>

              <div class="form-group row">
                  <label for="agama" class="col-sm-2 col-form-label text-sm">Agama</label>
                    <div class="col-sm-10">
                  <select class="form-control form-control" name="agama_penduduk">
                        <option placeholder="Apa Agama kamu..."></option>
                        <option>Kristen Protestan</option>        
                        <option>Islam</option>
                        <option>Kristen Katolik</option>
                        <option>Hindu </option>
                        <option>Buddha </option>
                        <option>Konghucu </option>
                   </select>
                   </div>

              </div>  
              <div class="form-group row">
                  <label for="jenis" class="col-sm-2 col-form-label text-sm">Status Perkawinan?</label>
                  <div class="col-sm-10">
                  <select class="form-control form-control" name="status_nikah">
                  <option placeholder="Status perkawinan"></option>
                  <option value="Sudah Kawin" >Sudah Kawin</option>
                  <option value="Belum Kawin" >Belum Kawin</option>
                  <option value="Cerai Hidup" >Cerai Hidup</option>
                  <option value="Cerai Mati" >Cerai Mati</option>
                </select>
              </div>
              </div>
                 </div>
                    <div class="col">

                    <div class="form-group row">
                       <div class="col-sm-10">
                        <select name="pekerjaan_penduduk" id="pekerjaan_penduduk" class="form-control">
                            <option>Pilih Pekerjaan</option>
                            <option value="Guru" >Guru</option>
                            <option value="Petani" >Petani</option>
                            <option value="Staff Desa" >Staff Desa</option>
                            <option value="PNS" >PNS</option>
                        </select>
                       </div>
                       <label for="pekerjaan" class="text-sm">Pekerjaan</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="dusun_penduduk" id="dusun" aria-describedby="dusun" >
                        </div>
                        <label for="exampleInputEmail1" class="text-sm">Dusun</label>
                   </div>
            
                   <div class="form-group row">
                   <div class="col-sm-10">
                       <input type="number" class="form-control" id="rt" name="tr_penduduk" aria-describedby="rt" >
                    </div>
                    <label for="exampleInputEmail1" class="text-sm">RT</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">
                             <input type="number" class="form-control" id="rw" name="rw_penduduk" aria-describedby="rw" >
                        </div>
                        <label for="exampleInputEmail1" class="text-sm">RW</label>
                   </div>

                   <div class="form-group row">
                        <div class="col-sm-10">      
                          <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir_penduduk" aria-describedby="tempat_lahir">
                        </div>
                      <label for="exampleInputEmail1" class="col-2 col-form-label text-sm">Tempat Lahir</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">            
                           <input type="date" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir_penduduk" aria-describedby="tanggal_lahir" >
                       </div>
                        <label for="exampleInputEmail1" class="col-2 col-form-label text-sm">Tempat Lahir</label>
                    </div>
                    
              </div>
            </div>
      
                     <div class="row">
                           <div class="col-9"></div>
                           <div class="col-3">
                             <button type="submit" class="btn btn-success btn-bg">SIMPAN</button>
                            <a href="{{ url('penduduk')}}" class="btn btn-danger btn-bg">BATAL</a>
                           </div>
                      </div>
                    </div>
                  </form>
                </div>
       </section>
     </div>
</div>
@include('layouts.footer')
