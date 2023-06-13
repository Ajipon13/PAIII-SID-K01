@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
           <div class="card">
           <div class="card-header">
              <h3 class="text-center text-bold mt-2 ">Tambah Informasi Desa</h3>
            </div>
                <div class="card-body">
                    <form action="" method="post">
                    <div class="form">
                         <label for="">Judul</label>
                         <input type="text" name="" class="form-control" id="">
                    </div>
                    <div class="form">
                         <label for="">Deskripsi</label>
                         <input type="url" name="" class="form-control" id="">
                    </div>
                    <div class="mt-2 row">
                         <div class="col-9"></div>
                         <div class="col-3">
                              <a href="{{ url('info') }}" class="btn btn-danger text-dark">KEMBALI</a>
                              <button type="submit" class="btn btn-success text-dark">SIMPAN</button>
                         </div>
                    </div>
                    </form>
                </div>
      </div>

    </session>
  </div>
</div>
@include('layouts.footer')