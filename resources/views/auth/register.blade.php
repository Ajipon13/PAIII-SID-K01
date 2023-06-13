@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
     <section class="content">
      <div class="row">
        <div class="col-12">
        @if ($message = Session::get('success'))
      <div class="alert alert-danger text-center alert-block">
          <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="card">
          <div class="card-header row">
       
            <div class="col-9">
                
                <b><center> DAFTARKAN USER BARU</center></b>
            </div>
          </div>
        <div class="card-body">
          <form action="{{ url('register_acti')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
                <div class="row mt-1">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control" type="text" name="username">
                        </div>
                        <div class="form-group">
                              <label for="form-group mt-3">Email</label>
                              <input class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group">
                              <label for="form-group mt-3">Gambar</label>
                              <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <div class="col-6">
                       <div class="form-group">
                          <label for="form-group mt-3">Password</label>
                          <input class="form-control" type="password" name="password" >
                        </div>

                        <div class="form-group">
                          <label for="form-group mt-3">Confirmasi Password</label>
                          <input class="form-control" type="password" name="password_confirm">
                        </div>

                        <div class="form-group">
                          <label for="level">Level / Role</label>
                          <select name="level" id="level">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                        </div>

                        <a href="/getuser" class="btn btn-warning">BATALKAN</a>
                        <button type="submit" class="btn btn-info">DAFTARKAN</button>

                      </div>
                </div>
          </form>
          </div>
        </div>

     </div>
    </div>
  </section>
 </div>
</div>
@include('layouts.footer')

