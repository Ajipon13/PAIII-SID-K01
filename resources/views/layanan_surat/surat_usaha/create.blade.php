@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
 <div class="content-header">
  <section class="content">
  <a href="/admin" class="">Dashboard</a>>
  <a href="/pjs" class="">Layanan Surat</a>>
  <a class="" href="/su" >data surat usaha</a>>
  <a class="">form input surat</a>
  <div class="card">
      <div class="card-header text-center text-bold">
      Buat  Surat Keterangan Usaha
      </div>
     <div class="card-body">
     <form method="POST" action="{{ route('su.store') }}">
         @csrf
         @method('POST')
        <div class="row">
      
             <div class="col">
                <div class="form-group">
                  <label for="no">Nomor Surat:</label>
                  <input type="name" name="no" id="no" class="form-control" >
                  @error('no')
        <p class="text-danger">{{ $message }}</p>
    @enderror
                </div>

                <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control" >
                </div>

                <div class="form-group">
                <label for="t4_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="t4_lahir" id="t4_lahir" />
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" />
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
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" />
            </div>

            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" />
                </div>
            </div>

                    

          <div class="col">
          <div class="form-group">
                <label for="alamat">Alamat </label>
                <input type="text" class="form-control" id="alamat" name="alamat"/>
            </div>

         
            <div class="form-group">
                <label for="jenis_usaha">jenis_usaha</label>
                <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha"/>
            </div>

            <div class="form-group">
                <label for="year">Sejak</label>
                <input type="date" class="form-control" id="sejak" name="sejak" />
            </div>
    
            
            <div class="form-group mt-2">
               <button type="submit" class="btn" style="background-color:#81BC00; color:#ffffff;">BUAT SURAT</button>
               <a href="{{ url('su') }}" class="btn btn-danger">BATAL</a>
            </div>

          </div>
        </div>
      </form>
 </section>
</div>
</div>
@include('layouts.footer')
