@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <div class="card text-center text-bold shadow">
      <div class="card-header">
      <h3>EDIT PROFILE</h3>
      </div>
    </div>
    <div class="">
    <section class="content">

    @if(session('success'))
      <div class="alert text-center"  style="background-color:#00BFFF;">
      <strong>{{session('success')}}</strong>
      </div>
    @endif

        <div class="row">
        <div class="col-4">
          <div class="card">
          <div class="card-header">
          <span><center>Ganti Foto</center></span>
          </div>
          <div class="card-body">
          <br>
        <form action="{{ url('editprofile',Auth::user()->id) }}" method="post" class=" text-center" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @if(Auth::user()->level==1)
          <img src="{{ asset('storage/image/'.Auth::user()->image) }}" class="rounded-circle" style="max-width: 90px; height: 100px;"  alt="Profile Image">
          @endif
          @if(Auth::user()->level=='2' && '3')
          <img src="{{ Storage::url(Auth::user()->image) }}" class="rounded-circle" alt="Foto Anda" style="max-width: 90px; height: 100px;" >
          @endif
          <br>
            <strong>{{Auth::user()->username}}</strong>
          <input class="form-control" type="file" name="image"/><br> 
            <button type="submit" class="btn btn-info form-control mt-2">EDIT</button>
        </form>
        <br><br><br><br><br><br><br><br><br>
      </div>
          </div>
      </div>
      <div class="col-8">
        <div class="card">
        <div class="card-header">
         <span><center>Ubah Akun</center></span>
         </div>
        <div class="card-body">
       <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                <form action="{{ url('password') }}" method="POST">
                   @csrf
                   @method('put')
                   <div class="mb-3">
                       <p>Username </p>
                       <input class="form-control" type="username" name="username" value="{{Auth::user()->username}}"/>
                    </div>

                   <div class="mb-3">
                       <p>Password <span class="text-danger">*</span></p>
                       <input class="form-control" type="password" name="old_password" />
                    </div>

                    <div class="mb-3">
                          <p>New Password <span class="text-danger ">*</span></p>
                          <input class="form-control" type="password" name="new_password" />
                    </div>
              
                    <div class="mb-3">
                          <p>New Password Confirmation<span class="text-danger">*</span></p>
                          <input class="form-control" type="password" name="new_password_confirmation" />
                    </div>
            
                    <div class="mb-3 row">
                      <div class="col-9"></div>
                      <div class="col-3">
                        <button class="btn btn-primary">SIMPAN</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
</div>

        </div>

        </div>
    </div>

    </section>
</div>
</div>
</div>

@include('layouts.footer')

