@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content">
       <section class="content">
                  
<ol class="breadcrumb float-sm">
<a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
<a href="{{ url('pgmn')}}" class="">daftar pengumuman </a> > 
<a class="">create pengumuman</a>
</ol>

        <div class="card">
        <div class="card-header">
          <h3 class="text-center text-bold">Tambah Pengumuman</h3>
        </div>
       <div class="card-body">
        <form action="{{route('pgmn.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
          <div class="my-2 row">
            <div class="col-2">
               <label for="desk">Tanggal</label>
            </div>
            <div class="col-10">
              <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
           
          </div>
            <div class="my-2 row">
               <div class="col-2">
               <label for="gam">Judul Pengumuman</label>
               </div>
                <div class="col-10">
                  <input type="text" name="judul" id="judul" class="form-control">
            </div>
          </div>

          <div class="my-2 row">
               <div class="col-2">
               <label for="gam">Deskripsi Pengumuman</label>
               </div>
                <div class="col-10">
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
            </div>
          </div>

          <div class="my-2 row">
                    <div class="col-9"></div>
                    <div class="col-3">
                    <input type="submit" value="SIMPAN" class="btn btn-success">
            <a href="{{url('pgmn')}}" class="btn btn-danger">BATAL</a>
                    </div>
           
          </div>
        </form>
      </div>
        </div>
       </section>
     </div>
</div>
@include('layouts.footer')