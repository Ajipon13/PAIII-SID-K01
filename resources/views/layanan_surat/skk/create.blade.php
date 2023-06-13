@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
 <div class="content-header">
  <section class="content">
  <a href="/admin" class="">Dashboard</a>>
  <a href="/pjs" class="">Layanan Surat</a>>
  <a class="" href="/skk" > data surat kbm</a>>
  <a class="">form input surat</a>
   <div class="card">
     <div class="card-header text-center text-bold">
       Edit  Surat Keterangan Menikah 
     </div>
   
    <form action="{{ route('skk.store') }}" method="post" enctype="multipart/form-data" class="container">
      @csrf
      @method('POST')
        <div class="row">
             <div class="col">

                <div class="form-group">
                  <label for="nama">Nomor Surat</label>
                  <input type="text" name="no" id="no" class="form-control" >
                </div>

                <div class="form-group">
                  <label for="nama">Nama</label>
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
                <label for="tgl">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
            </div>
            
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="name" class="form-control" id="agama" name="agama"/>
            </div>

            <div class="form-group">
                <label for="s_pernikaan">Status Perkawinan</label>
                <input type="name" class="form-control" id="s_pernikaan" name="s_pernikaan" />
            </div>

            <div class="form-group">
               <label for="pekerjaan">Pekerjaan</label>
              <input type="name" class="form-control" id="pekerjaan" name="pekerjaan" />
           </div>

          </div>
          <div class="col">
              <div class="form-group">
                  <label for="warga_negara">Keawarganegaraan</label>
                  <input type="name" class="form-control" id="warga_negara" name="warga_negara" />
              </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" >
                </div> 
   
             <div class="form-group">
               <label for="nama_pasang">Nama Pasangan</label>
               <input type="name" class="form-control" id="nama_pasang" name="nama_pasang"/>
             </div>
                    
             <div class="form-group">
               <label for="wargapasangan">Kewarganegaraan Pasangan</label>
               <input type="name" class="form-control" id="wargapasangan" name="wargapasangan"/>
             </div>
         
            <div class="form-group mt-5">
                  <button type="submit" class="btn" style="background-color:#81BC00; color:#ffffff;">BUAT SURAT</button>
                  <a href="{{url('skk')}}" class="btn btn-danger">BATAL</a>
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
