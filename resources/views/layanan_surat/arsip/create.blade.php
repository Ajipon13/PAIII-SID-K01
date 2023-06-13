@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
   <a href="/admin" class="">Dashboard</a>/
   <a href="/lanyanansurat" class="">Layanan Surat</a>/
   <a href="/" class="">Arsib Surat skb</a>

   <div class="card-header bg-warning text-center text-bold">
      ARSIB SURAT SKB
   </div>
<form action="{{url('store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="context">Tujuan/Isi Surat</label>
   <textarea  type="text" name="context" id="" cols="143" rows="10" class="mt-2 form-control"></textarea>

   <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="nom">Nik</label>
                <input type="name" class="form-control"placeholder="Masukkan nik mu" name="no_ktp" id="no_ktp" />
            </div>
        
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="name" class="form-control" placeholder="Masukkan nama" id="nama" name="nama" aria-describedby="nama"/>
            </div>  
            <div class="form-group">
                <label for="nama">RT/RW</label>
                <input type="name" class="form-control" placeholder="rt/rw" id="rtrw" name="rtrw" aria-describedby="rtrw"/>
            </div>
        </div>
        <div class="col">
        <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control form-control">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="nama">Pendidikan Terakhir</label>
                <input type="name" class="form-control" id="pendidikan" name="pendidikan" aria-describedby="pendidikan"/>
            </div>
            <div class="form-group">
                <label for="nama">Tanggal Pemebuatan Surat</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal"/>
            </div>

        </div>

        <div class="col">
        <div class="form-group">
                <label for="nik">Status Perkawinan</label>
                <select name="perkawinan" id="perkawinan" class="form-control form-control">
                    <option value="" placeholder="Pilih Status anda"></option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="name" class="form-control" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan"/>
            </div>
            <div class="form-group mt-5">
                <a href="{{url('surat')}}" class="btn btn-secondary">BATAL</a>
                <button type="submit" class="btn btn-info">BUAT SURAT</button>
            </div>
        </div>
  </div>
 </form>
    </div>    
      </div>
    </section>
    </div>
        <!-- /.col -->
      </div>
      <script src="https://www.w3schools.com/js/myScript.js"></script>
      <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
      <link rel="import" href="http://example.com/ckeditor/plugins/sourcearea
">
      
<script>
   var konten = document.getElementById("konten");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
@include('layouts.footer')
