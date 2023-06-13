@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
    <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('/Dashboard/admin')}}" class="">Dashboard</a>>
            <a class=""  href="{{('/t_usaha')}}">tempat usaha</a>>
            <a class="">edit tempat usaha</a>
            </ol>
          </div>
      <div class="container">
           <div class="card">

                <div class="card-header text-center text-bold">
                EDIT DATA TEMPAT USAHA
                </div>
                <div class="card-body">
                    <form action="{{ route('t_usaha.update',$edit->id) }}" method="post">
                       @csrf 
                       @method('put')
                        <div class="form-group row">
                            <label for="jenis_usaha" class="col-sm-2 col-form-label">Jenis Usaha</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" name="jenis_usaha" value="{{$edit->jenis_usaha}}" >
                         </div>
                         </div>
                         <div class="form-group row">
                         <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                         <div class="col-sm-10">
                              <input type="number" class="form-control" name="jumlah" value="{{$edit->jumlah}}">
                         </div>
                         </div>
                         <div class="form-group row">
                         <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                         <div class="col-sm-10">
                              <input type="text" class="form-control" name="Lokasi" value="{{$edit->Lokasi}}">
                         </div>
                         </div>

                    <div class="mt-2 row">
                         <div class="col-9"></div>
                         <div class="col-3">
                              <a href="{{ url('t_usaha') }}" class="btn btn-danger text-white">KEMBALI</a>
                              <button type="submit" class="btn btn-success text-white">SIMPAN</button>
                         </div>
                    </div>
                    </form>
                </div>
      </div>
  </div>
    </session>
  </div>
</div>