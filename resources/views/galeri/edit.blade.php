@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<section class="content">
      <div class="row">
        <div class="col-12">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a href="{{ url('galeri')}}" class="">index galeri</a>>
            <a class="">edit galeri</a>
            </ol>
          </div>
        
          <div class="card">
        <div class="card bg-yellow shadow" style="border-radius:20px;">
          <h3 class="text-center">EDIT GAMBAR</h3>
        </div>
       <div class="card-body">
        <form action="{{route('galeri.update',$galeri->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="my-2 row">
            <div class="col-2">
              <label for="desk">Nama</label>
            </div>
            <div class="col-10">
              <input name="desk" id="desk" rows="5" class="form-control" value="{{$galeri->desk }}"/>
            </div>
           
          </div>
            <div class="my-2 row">
              <div class="col-2">
                <label for="gam">Gambar</label>
              </div>
              <div class="col-10">
              <img src="/storage/img/{{ $galeri->img }}" style="width:200px; height:100px;">
                  <input type="file" name="img" id="img" class="form-control">
                    @error('file')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
          </div>
          <div class="my-2 row">
                    <div class="col-9"></div>
                    <div class="col-3">
                    <input type="submit" value="SIMPAN" class="btn btn-success">
            <a href="{{url('galeri')}}" class="btn btn-danger">BATAL</a>
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
<!-- TUTUP TAMPILKAN DATA WEMILES YIKWA -->

@include('layouts.footer')