@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
      <div class="row ">
        <div class="container">
            <div class="col-sm-9">
               <ol class="breadcrumb float-sm">
                  <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
                  <a class="">data pengguna</a>
               </ol>
            </div>
          <div class="dataTables_wrapper dt-bootstrap4 card">
                  <div class="row container ">

                    <div class="col mt-2">
                            <a href="{{ url('user') }}" class="ml-2 btn btn border border-success shadow btn-outline-success" ><i class="fa fa-user-plus" aria-hidden="true"></i>Tambah User</a>
                    </div>
                  </div>

      <div class="container">

          <div class="card-header text-center">
            Data Staff Desa
          </div>
         <div class="card-body">
          <table class="table table">
             <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Gambar</th>
             </tr>
             @foreach($datauser as $user)
             <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>
                  
                    @if($user->level==1)
                    <a class="btn-outline">Admin</a>
                    @elseif($user->level==2)
                    Desa
                    @elseif($user->level==3)
                    Bedahara
                     @elseif($user->level== 4 )
                    NO Role
                     @endif
                </td>
                <td>
                @if($user->level==1)
                  <img src="{{ asset('storage/image/'.Auth::user()->image) }}" class="rounded" style="max-width: 90px; height: 100px;"  alt="No Profile Image">
                @endif
                @if($user->level==2 && 3)
                <img src="{{ Storage::url($user->image) }}" alt="no image"  class="rounded" alt="Foto Anda" style="max-width: 90px;" >
                @endif
                </td>
            
             </tr>
            @endforeach
          </table>
         
        </div>
        </div>
        </div>
        </div>
      </div>
    </section>
    </div>
  </div>
@include('layouts.footer')
