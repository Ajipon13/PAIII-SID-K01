@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
       <section class="content">

              <div class="card">
                    <div class="card-header">
                    <h4 class="text-center">BUAT PROFILE DESA</h4>
                    </div>
                    <div class="card-body">
        <form action="{{ route('profil.store')}}" method="POST" enctype="multipart/form-data">
        @csrf       
        <div class="my-2 row">
                <label for="gam">Gambar Desa </label>
                <div class="col-10">
                  <input type="file" name="profile_img" class="form-control"/>
                </div>  
            </div>
            <div class="my-2 row">
                <label for="gam">Profile desa </label>
                <div class="col-10">
                  <textarea type="text" name="profile_desa"cols="30" rows="10" class="form-control"></textarea>
                </div>  
            </div>
          </div>
          <div class="my-2 row">
                    <div class="col-9"></div>
                    <div class="col-3">
                    <input type="submit" value="SIMPAN" class="btn btn-success">
            <a href="{{url('profil')}}" class="btn btn-danger">BATAL</a>
                    </div>
           
          </div>
        </form>
      </div>
</div>

       </section>
     </div>
</div>
@include('layouts.footer')