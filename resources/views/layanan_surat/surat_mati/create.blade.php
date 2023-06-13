@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
 <div class="content-header">
  <section class="content">
  <a href="/admin" class="">Dashboard</a>>
  <a href="/pjs" class="">Layanan Surat</a>>
  <a class="" href="/sbk" >data surat kbm</a>>
  <a class="">form input surat</a>
   <div class="card">
     <div class="card-header text-center text-bold">
     Buat  Surat Keterangan Kematian
     </div>
   
    <form action="{{ route('sm.store') }}" method="post" enctype="multipart/form-data" class="container">
      @csrf
      @method('POST')
        <div class="row">
             <div class="col-4">

                <div class="form-group">
                  <p for="nomor">Nomor Surat:</p>
                  <input type="text" name="nomor" id="nomor" class="form-control" >
                </div>

                <div class="form-group">
                  <p for="nama_meninggal">Nama:</p>
                  <input type="text" name="nama_meninggal" id="nama_meninggal" class="form-control" >
                </div>

                <div class="form-group">
                  <p for="nik_maninggal">NIK:</p>
                  <input type="text" name="nik_meninggal" id="nik_meninggal" class="form-control" >
                </div>

                <div class="form-group">
                  <p for="jk_meninggal">Jenis Kelamin</p>
                  <select name="jk_meninggal" id="jk_meninggal" class="form-control form-control">
                     <option value=""></option>
                     <option value="Laki-Laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                

            </div>
            <div class="col-4">
                    
                  <div class="form-group">
                      <p for="t4_lahir">Tempat Lahir</p>
                      <input type="text" class="form-control" name="t4_lahir_meninggal" id="t4_lahir_meninggal" />
                  </div>

                  <div class="form-group">
                      <p for="tgl_lahir_meninggal">Tanggal Lahir</p>
                      <input type="date" class="form-control" name="tgl_lahir_meninggal" id="tgl_lahir_meninggal" />
                  </div>
              
                  <div class="form-group">
                      <p for="wargaN_meninggal">Warga Negara</p>
                      <input type="name" class="form-control" id="wargaN_meninggal" name="wargaN_meninggal" />
                  </div>

                  <div class="form-group">
                      <p for="agama_meniggal">Agama</p>
                      <input type="name" class="form-control" id="agama_meniggal" name="agama_meniggal"/>
                  </div>
                    
          </div>

          <div class="col-4">

            <div class="form-group">
                <p for="s_pernikaan_meninggal">Status Pernikahan</p>
                <input type="name" class="form-control" id="s_pernikaan_meninggal" name="s_pernikaan_meninggal"/>
            </div>
             
            <div class="form-group">
                <p for="pekerjaanM">Pekerjaan</p>
                <input type="name" class="form-control" id="pekerjaanM" name="pekerjaanM"/>
            </div>

             <div class="form-group">
                <p for="alamatM">Alamat</p>
                <input type="name" class="form-control" id="alamatM" name="alamatM" />
            </div>

          </div>
        </div>   
        <hr>
        <div class="row"> 
          <div class="col-4 card">
          <strong>Telah Meninggal Dunia Pada : </strong>
                <div class="form-group">
                    <p for="tgl_meningaal">Tanggal </p>
                     <input type="date" class="form-control" name="tgl_meningaal" id="tgl_meningaal"/>
                </div>

                <div class="form-group">
                     <p for="waktuM">Jam</p>
                     <input type="time" class="form-control" name="waktuM" id="waktuM"/>
                </div>
                <div class="form-group">
                    <p for="t4_meinggal">Tempat Meninggal</p>
                    <input type="text" class="form-control" name="t4_meinggal" id="t4_meinggal" />
               </div>
               <div class="form-group">
                  <p for="sebab">Sebab Meninggal</p>
                  <input type="text" class="form-control" name="sebab" id="sebab" />
              </div>

          </div>

             <div class="col-4">
            <strong>Berdasarkan Surat Pernyataan Dari : </strong>
                <div class="form-group">
                <p for="nama_pembuat">Nama</p>
                <input type="text" class="form-control" name="nama_pembuat" id="nama_pembuat"/>
            </div>
              
              <div class="form-group">
                  <p for="nik_pembuat">NIK:</p>
                  <input type="text" name="nik_pembuat" id="nik_pembuat" class="form-control" >
              </div>

              <div class="form-group">
                <p for="t4_lahir_pembuat">Tempat Lahir</p>
                <input type="text" class="form-control" name="t4_lahir_pembuat" id="t4_lahir_pembuat" />
             </div>

             </div>


              <div class="col-4">
              <div class="form-group">
                <p for="tgl_lahir_pembuat">Tanggal Lahir</p>
                <input type="date" class="form-control" name="tgl_lahir_pembuat" id="tgl_lahir_pembuat" />
              </div>

              <div class="form-group">
                <p for="pekerjaan_pemnuat">Pekerjaan</p>
                <input type="name" class="form-control" id="pekerjaan_pemnuat" name="pekerjaan_pemnuat" />
              </div>

              <div class="form-group">
                <p for="alamat_pembuat">Alamat</p>
                <input type="text" class="form-control" id="alamat_pembuat" name="alamat_pembuat" />
              </div>

              <div class="form-group mt-5">
                  <button type="submit" class="btn" style="background-color:#81BC00; color:#ffffff;">BUAT SURAT</button>
                  <a href="{{url('sm')}}" class="btn btn-danger">BATAL</a>
              </div>

          </div>
        </div>

    </form>
    </div>
  </div>
 </section>
</div>
</div>
@include('layouts.footer')


   



   



