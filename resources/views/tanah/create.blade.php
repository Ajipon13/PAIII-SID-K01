@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
    <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a class="" href="{{ url('tanah')}}">index tanah</a>>
            <a class="">tambah tanah</a>
            </ol>
          </div>
           <div class="card">
                <div class="card-header text-center text-bold">
                TAMBAH DATA TANAH
                </div>
                <div class="card-body">
                    <form action="{{ route('tanah.store')}}" method="post" enctype="multipart/form-data">
                         @csrf 
                         @method('POST')
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="NamaPemilik">Nama Pemilik:</label>
                              </div>
                              <div class="col-10">
                              <input type="text" class="form-control" id="NamaPemilik" name="NamaPemilik">
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="AlamatPemilik">Alamat Pemilik:</label>
                              </div>
                           <div class="col-10">
                           <input type="text" class="form-control" id="AlamatPemilik" name="AlamatPemilik">
                           </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="JenisTanah">Jenis Tanah:</label>
                              </div>
                              <div class="col-10">
                              <select class="form-control" id="JenisTanah" name="JenisTanah">
                                   <option value="">Pilih jenis tanah</option>
                                   <option value="Sawah">Sawah</option>
                                   <option value="Ladang">Ladang</option>
                                   <option value="Perkebunan">Perkebunan</option>
                                   <option value="Kebun Binatang">Kebun Binatang</option>
                              </select>
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="UkuranTanah">Ukuran Tanah (m2):</label>
                              </div>
                              <div class="col-10">
                                   <input type="number" class="form-control" id="UkuranTanah" name="UkuranTanah" value="m²">
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="Status">Status Kepemilikan:</label>
                              </div>
                              <div class="col-10">
                              <select class="form-control" id="Status" name="Status">
                                   <option value="">Pilih status kepemilikan tanah</option>
                                   <option value="Milik Sendiri">Milik Sendiri</option>
                                   <option value="Warisan">Warisan</option>
                                   <option value="Sewa">Sewa</option>
                              </select>`
                         </div>
                         </div>
                         <div class="mt-2 row">
                              <div class="col-9"></div>
                              <div class="col-3">
                                   <button type="submit" class="btn btn-success  text-white">SIMPAN</button>
                                   <a href="{{ url('tanah') }}" class="btn btn-danger  text-white">KEMBALI</a>
                              </div>
                         </div>
                    </form>
                </div>
      </div>
    </session>
  </div>
</div>
@include('layouts.footer')
