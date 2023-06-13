@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
       <section class="content">
          
       <div class="row">
           <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{ url('Dashboard/admin')}}" class="">Dashboard</a>>
            <a href="/penduduk" class="">index Penduduk</a>>
            <a href="#" class="">Edit Penduduk</a>
            </ol>
          </div>

<!-- HALAMAN CREATE DATA WEMILES YIKWA-->
<div class="container">
     <form action="{{ route('penduduk.update',$update->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card">
          <div class="catd-header">
               <h4 class="text-center mt-2">Edit Data Penduduk !</h4>
               <hr>
          </div>
          <div class="container">
             <div class="row">

                 <div class="col">
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-sm" >Nik</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control" name="nik_penduduk" id="nik_penduduk" value="{{$update->nik_penduduk}}" >
                     </div>
                    </div>

              <div class="form-group  row">
                  <label for="nama" class="col-sm-2 col-form-label text-sm">Nama</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control" value="{{$update->nama_penduduk}}" id="nama" name="nama_penduduk" aria-describedby="namalHelp">
                  </div>
              </div>
            
              <div class="form-group row">
                  <label for="jenis" class="col-sm-2 col-form-label text-sm">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <select class="form-control form-control" name="jk_penduduk">
                        <option placeholder="Apa jenis kelamin">{{$update->jk_penduduk}}</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
              </div>

              <div class="form-group row">
                  <label for="agama" class="col-sm-2 col-form-label text-sm">Agama</label>
                    <div class="col-sm-10">
                  <select class="form-control form-control" name="agama_penduduk">
                        <option value="{{$update->agama_penduduk}}">{{$update->agama_penduduk}}</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>        
                        <option value="Islam">Islam</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu </option>
                        <option value="Buddha">Buddha </option>
                        <option value="Konghucu">Konghucu </option>
                   </select>
                   </div>

              </div>  
              <div class="form-group row">
                  <label for="jenis" class="col-sm-2 col-form-label text-sm">Status Perkawinan?</label>
                  <div class="col-sm-10">
                  <select class="form-control form-control" name="status_nikah">
                  <option value="{{$update->status_nikah}}"> {{$update->status_nikah}}</option>
                  <option value="Sudah Kawin">Sudah Kawin</option>
                  <option value="Belum Kawin">Belum Kawin</option>
                  <option value="Cerai Hidup" >Cerai Hidup</option>
                  <option value="Cerai Mati" >Cerai Mati</option>
                </select>
              </div>
              </div>
                 </div>
                    <div class="col">

                    <div class="form-group row">
                       <div class="col-sm-10">
                           <input type="text" class="form-control" id="pekerjaan" name="pekerjaan_penduduk" value="{{$update->pekerjaan_penduduk}}" aria-describedby="pekerjaan" >
                       </div>
                       <label for="pekerjaan" class="text-sm">Pekerjaan</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">
                          <input type="text" class="form-control" name="dusun_penduduk" id="dusun" value="{{ $update->dusun_penduduk }}" aria-describedby="dusun" >
                        </div>
                        <label for="exampleInputEmail1" class="text-sm">Dusun</label>
                   </div>
            
                   <div class="form-group row">
                   <div class="col-sm-10">
                       <input type="number" class="form-control" id="tr_penduduk" name="tr_penduduk" value="{{$update->tr_penduduk}}" aria-describedby="rt" >
                    </div>
                    <label for="exampleInputEmail1" class="text-sm">RT</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">
                             <input type="number" class="form-control" id="rw" name="rw_penduduk" value="{{$update->rw_penduduk}}" aria-describedby="rw" >
                        </div>
                        <label for="exampleInputEmail1" class="text-sm">RW</label>
                   </div>

                   <div class="form-group row">
                        <div class="col-sm-10">      
                          <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir_penduduk" value="{{$update->tempat_lahir_penduduk}}" aria-describedby="tempat_lahir">
                        </div>
                      <label for="exampleInputEmail1" class="col-2 col-form-label text-sm">Tempat Lahir</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">            
                           <input type="date" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir_penduduk" value="{{$update->tanggal_lahir_penduduk}}" aria-describedby="tanggal_lahir" >
                       </div>
                        <label for="exampleInputEmail1" class="col-2 col-form-label text-sm">Tempat Lahir</label>
                    </div>
                    
              </div>
            </div>
      
                     <div class="row">
                           <div class="col-9"></div>
                           <div class="col-3">
                             <button type="submit" class="btn btn-success btn-bg">SIMAPAN</button>
                            <a href="{{ url('penduduk')}}" class="btn btn-danger btn-bg">BATAL</a>
                           </div>
                      </div>
                    </div>
                  </div>
             </div>
          </form>
        </div>
       </section>
     </div>
</div>
@include('layouts.footer')
