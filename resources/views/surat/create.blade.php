@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
   <a href="/admin" class="">Dashboard</a>>
   <a href="/pjs" class="">layanan surat</a>>
   <a href="/skbb" class="">data surat kkb</a>>
   <a>buat layanan surat</a>
<div class="card">
   <div class="card-header text-center text-bold">
      Buat Surat Keteragan Perbuatan Baik 
   </div>
    <form action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data" class="container">
        @csrf
        @method('POST')
       
    <div class="row">
        
            <div class="col">
            <div class="form-group">
                    <label for="nom">Nomor Surat</label>
                    <input type="number" class="form-control" name="no" id="no" />
                </div>

                <div class="form-group">
                    <label for="nom">Nik</label>
                    <input type="name" class="form-control" name="no_ktp" id="no_ktp" />
                </div>

          
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="name" class="form-control" id="nama" name="nama" aria-describedby="nama"/>
                </div>  
            
            </div>
            <div class="col">
            <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control form-control">
                        <option value=""></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label for="nama">Pendidikan Terakhir</label>
                    <input type="name" class="form-control" id="pendidikan" name="pendidikan" aria-describedby="pendidikan"/>
                </div>
                <!-- <div class="form-group">
                    <label for="nama">Tanggal Pemebuatan Surat</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal"/>
                </div> -->

            </div>

            <div class="col">
            <div class="form-group">
                    <label for="nik">Status Perkawinan</label>
                    <select name="perkawinan" id="perkawinan" class="form-control form-control">
                        <option value=""></option>
                        <option value="Kawin">Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="nama">RT/RW</label>
                    <input type="name" class="form-control" id="rtrw" name="rtrw" aria-describedby="rtrw"/>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="name" class="form-control" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan"/>
                </div>
              </div>
            </div>
                <label for="context">Keperluan</label>  
                <textarea  type="text" name="context" id="" cols="143" rows="10" class="mt-2 form-control"></textarea>

                <div class="form-group mt-5 row">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success">BUAT SURAT</button>
                        <a href="{{ url('lanyanansurat') }}" class="btn btn-danger">BATAL</a>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>    
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
