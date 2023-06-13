@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
 <div class="content-header">
  <section class="content">
  <a href="/admin" class="">Dashboard</a>>
  <a href="/pjs" class="">Layanan Surat</a>>
  <a class="" href="/domisili" >data surat kbm</a>>
  <a class="">form input surat</a>
  <div class="card">
      <div class="card-header text-center text-bold">
      Buat  Surat Keterangan Domisili
      </div>
     <div class="card-body">
     <form method="POST" action="{{ route('domisili.store') }}">
         @csrf
         @method('POST')
        <div class="row">
             <div class="col">
                <div class="form-group">
                  <label for="no">Nomor Surat:</label>
                  <input type="name" name="no" id="no" class="form-control" >
                </div>

                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control" >
                </div>

                <div class="form-group">
                  <label for="nik">NIK:</label>
                  <input type="text" name="nik" id="nik" class="form-control" >
                </div>

                <div class="form-group">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" id="jk" class="form-control form-control">
                     <option value=""></option>
                     <option value="Laki-Laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                  </select>
                </div>

            </div>
            <div class="col">
 
            <div class="form-group">
                <label for="t4_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="t4_lahir" id="t4_lahir" />
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
            </div>
        
            <div class="form-group">
                <label for="warga">Warga Kenegaraan</label>
                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" />
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" />
            </div>
            

          </div>
          <div class="col">
          <div class="form-group">
                <label for="desa">Alamat Domilisi Desa</label>
                <input type="text" class="form-control" id="desa" name="desa"/>
            </div>


            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan"/>
            </div>

            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" class="form-control" id="kabupaten" name="kabupaten" />
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" />
            </div>
            <div class="form-group mt-2">
                  <button type="submit" class="btn" style="background-color:#81BC00; color:#ffffff;">BUAT SURAT</button>
                  <a href="{{ url('domisili') }}" class="btn btn-danger">BATAL</a>
            </div>

          </div>
        </div>
                </form>
 </section>
</div>
</div>
@include('layouts.footer')
