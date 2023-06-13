@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content">
       <section class="content">
                  
<ol class="breadcrumb float-sm">
<a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
<a href="{{ url('strukt')}}" class="">struktur organisasi</a>>
<a class="">edit struktur baru</a>
</ol>

        <div class="card">
        <div class="card-header">
          <h3 class="text-center text-bold">EDIT STRUKTUR ORGANISASI</h3>
        </div>
       <div class="card-body">
        <form action="{{route('strukt.update',$struk->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
          <div class="my-2 row">
            <div class="col-2">
            <label for="desk">Tahun Agaran</label>
            </div>
          <div class="col-10">
                    <input type="text" name="tahun" value="{{$struk->tahun}}" class="form-control">
            </div>
           
          </div>
          <img src="/gambar/{{ $struk->gambar }}" style="width:200px; height:100px;">

            <div class="my-2 row">
          <div class="col-2">
            <label for="gam">File Struktur</label>
          </div>
            <div class="col-10">
                  <input type="file" name="gambar" value="{{ $struk->gambar}}" class="form-control">
                </div>  
            </div>
          </div>
          <div class="my-2 row">
                    <div class="col-9"></div>
                    <div class="col-3">
                    <input type="submit" value="SIMPAN" class="btn btn-success">
            <a href="{{url('strukt')}}" class="btn btn-danger">BATAL</a>
                    </div>
           
          </div>
        </form>
      </div>
        </div>
       </section>
     </div>
</div>
@include('layouts.footer')