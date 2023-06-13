@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
   <a href="/admin" class="">Dashboard</a>>
   <a href="/pjs" class="">Layanan Surat</a>>
   <a class="" href="/skbb" >data surat skbb</a>>
   <a class="">form input surat</a>
<div class="card">
   <div class="card-header text-center text-bold">
   Buat  Surat Keterangan Berkelakuan Baik
   </div>
   <form action="{{ route('skbb.store') }}" method="post" enctype="multipart/form-data" class="container">
    @csrf
    @method('POST')
        <div class="row">
             <div class="col">
             <div class="form-group">
                  <label for="nama">Nomor Suarat:</label>
                  <input type="text" name="no" id="no" class="form-control" >
                </div>

                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control" >
                </div>
                <div class="form-group">
                 <label for="jk">Jenis Kelamin</label>
                 <select name="jk" id="jk" class="form-control form-control">
                     <option value=""></option>
                     <option value="Laki-Laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                 </select>
             </div>

             <div class="form-group">
                <label for="t4_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="t4_lahir" id="t4_lahir" />
            </div>

           </div>
          <div class="col">
          <div class="form-group">
                <label for="nom">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
            </div>
        
            <div class="form-group">
                <label for="nama">Warga Kenegaraan</label>
                <input type="name" class="form-control" id="bangsa" name="bangsa" aria-describedby="bangsa"/>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="name" class="form-control" id="agama" name="agama" aria-describedby="agama"/>
            </div>
          </div>
       
          <div class="col">
          <div class="form-group">
                <label for="status">Status Perkawinan</label>
                <input type="name" class="form-control" id="status_perkawinan" name="status_perkawinan" aria-describedby="status_perkawinan"/>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="name" class="form-control" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan"/>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="name" class="form-control" id="alamat" name="alamat" aria-describedby="alamat"/>
            </div>
              <div class="form-group mt-5">
                  <button type="submit" class="btn" style="background-color:#81BC00; color:#ffffff;">BUAT SURAT</button>
                  <a href="{{url('skbb')}}" class="btn btn-danger">BATAL</a>
              </div>
             </div>
          </div>
        </form>
       </div>
    </div>    
      </div>
    </section>
    </div>
      </div>

@include('layouts.footer')
