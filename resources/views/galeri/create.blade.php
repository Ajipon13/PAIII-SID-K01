@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content">
       <section class="content">
                  
       <div class="col-sm-12">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a href="{{ url('galeri')}}" class="">index galeri</a>>
            <a class="">tambah galeri</a>
            </ol>
          </div>
        <div class="card">
        <div class="card bg-yellow shadow" style="border-radius:20px;">
          <h3 class="text-center">TAMBAH GAMBAR</h3>
        </div>
       <div class="card-body">
        <form action="{{route('galeri.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
          <div class="my-2 row">
            <div class="col-2">
              <label for="desk">Nama</label>
            </div>
            <div class="col-10">
              <input name="desk" id="desk" rows="5" class="form-control"/>
            </div>
           
          </div>
            <div class="my-2 row">
              <div class="col-2">
                <label for="gam">Gambar</label>
              </div>
                <div class="col-10">
                  <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror">
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
       </section>
     </div>
</div>
@include('layouts.footer')