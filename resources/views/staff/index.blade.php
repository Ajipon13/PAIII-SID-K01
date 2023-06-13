@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
  <a href="/admin" class="">Dashboard</a>>
   <a class="">Data Staff Desa</a>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card bg-yellow shadow" style="border-radius:20px;">
              <h3 class="text-center text-bold mt-2 ">DATA STAFF DESA</h3>
            </div>
            @if(session('success'))
            <div class="alert text-center"  style="background-color:#00BFFF;">
            <strong>{{session('success')}}</strong>
            </div>
          @endif
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /.card-header -->          
            <div class="col-sm-12">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">

                    <div class="col-9">
                      @if(auth()->user()->level==1)
                            <a href="{{ url('staff/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success text-dark" ><i class="fa fa-user-plus" aria-hidden="true"></i>Tambah Data Staff</a>
                            <a href="{{ url('/staffexport') }}" class="ml-2 btn btn border border-success shadow btn-outline-success text-dark"><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                        @endif
                        @if(auth()->user()->level==2)
                            <a href="{{ url('exportstaff') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                        @endif
                          </div>
                  <div class="col-3">
                  @if(auth()->user()->level==1)
                      <form class="form-inline  mt-1" action="{{url('staff')}}" method="GET">
                        <div class="input-group input-group">
                          <input class="form-control form-control-navbar shadow rounded-pill" name="cari" type="search" placeholder="Cari..." aria-label="Search">
                            <div class="input-group-append">
                              <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                      </form>
                  @endif

                  @if(auth()->user()->level==2)
                      <form class="form-inline  mt-1" action="{{url('pegawaidesa')}}" method="GET">
                        <div class="input-group input-group">
                          <input class="form-control form-control-navbar shadow rounded-pill" name="cari" type="search" placeholder="Cari..." aria-label="Search">
                            <div class="input-group-append">
                              <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                      </form>
                  @endif

                  </div>
              <div class="col-sm-12 mt-2">
              <table class="table table-bordered text-center">
                  <tr>
                    <thead>
                      <th>NO</th>
                      <th>NIK</th>
                      <th>NAMA</th>
                      <th>JENIS KELAMIN</th>
                      <th>AGAMA</th>
                      <th>PEKERJAAN</th>
                      <th>PENDIDIKAN TERAKHIR</th>
                      @if(auth()->user()->level==1)
                         <th>AKSI</th>
                      @endif
                    </thead>
                  </tr> 
                  <tbody>
                    <?php $no = 1; ?>
                    @foreach($staff as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nik_staf}}</td>
                        <td>{{$item->nama_staf}}</td>
                        <td>{{$item->jenisk_staf}}</td>
                        <td>{{$item->agama_staf}}</td>
                        <td>{{$item->pekerjaan_staf}}</td>
                        <td>{{$item->pendidikan_staf}}</td>
                        <td>
                          <form action="{{ route('staff.destroy',$item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <a href="{{ route('staff.edit',$item->id)}}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm"  onclick="  return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="fa fa-trash "></i></button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              {{$staff->links()}}
              Jumlah data : {{$staff->count()}}
              <div class="text-center">
              </div>

        </div>
      </div>
    </section>
    </div>
  </div>
@include('layouts.footer')
