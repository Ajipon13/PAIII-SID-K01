@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
    <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('/Dashboard/admin')}}" class="">Dashboard</a>>
            <a class="" href="{{ url('tanah')}}">index tanah</a>>
            <a class="">edit tanah</a>
            </ol>
          </div>
           <div class="card">
                <div class="card-header text-center text-bold">
                EDIT DATA TANAH
                </div>
                <div class="card-body">
                    <form action="{{ route('tanah.update',$edit->id)}}" method="post" enctype="multipart/form-data">
                         @csrf 
                         @method('PUT')
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="NamaPemilik">Nama Pemilik:</label>
                              </div>
                              <div class="col-10">
                              <input type="text" class="form-control" name="NamaPemilik" value="{{$edit->NamaPemilik}}">
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="AlamatPemilik">Alamat Pemilik:</label>
                              </div>
                           <div class="col-10">
                           <input type="text" class="form-control" name="AlamatPemilik"  value="{{$edit->AlamatPemilik}}">
                           </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="JenisTanah">Jenis Tanah:</label>
                              </div>
                              <div class="col-10">
                              <select class="form-control" name="JenisTanah">
                                   <option value="{{$edit->JenisTanah}}"> {{$edit->JenisTanah}}</option>
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
                                   <input type="number" class="form-control" name="UkuranTanah" value="{{$edit->UkuranTanah}}">
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col-2">
                                   <label for="Status">Status Kepemilikan:</label>
                              </div>
                              <div class="col-10">
                              <select class="form-control" name="Status">
                                   <option value="{{$edit->Status}}">{{$edit->Status}}</option>
                                   <option value="Milik Sendiri">Milik Sendiri</option>
                                   <option value="Warisan">Warisan</option>
                                   <option value="Sewa">Sewa</option>
                              </select>`
                         </div>
                         </div>
                         <div class="mt-2 row">
                              <div class="col-9"></div>
                              <div class="col-3">
                                    <button type="submit" class="btn btn-success text-white">SIMPAN</button>
                                   <a href="{{ url('tanah') }}" class="btn btn-danger text-white">KEMBALI</a>
                              </div>
                         </div>
                    </form>
                </div>
      </div>
    </session>
  </div>
</div>