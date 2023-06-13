@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a class="">tanah desa</a>
            </ol>
          </div>
        @if(session('success'))
            <div class="alert text-center" role="alert" style="background-color:#00BFFF;">
                <smal>{{session('success')}}</smal>
            </div>
          @endif
          <div class="card">    
            <div class="card bg-yellow shadow" style="border-radius:20px;">
              <h3 class="text-center text-bold mt-2 ">TANAH DESA</h3>
            </div>

          @if(session('delete'))
            <div class="alert alert-danger text-center">
              <strong>Keuangan </strong>{{session('delete')}}
            </div>
          @endif
      
            <!-- /.card-header -->          
            <div class="col-sm-12">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">

                    <div class="col-9">
                    @if(auth()->user()->level==1)
                      <a href="{{ url('tanah/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success" ><i class="nav-icon fas fa-plus"></i>  Tambah Data Tanah Desa</a>
                    @endif
                      <a href="{{ url('tanah/show') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>excel</a>

                    </div>
                  <div class="col-3">
                  @if(auth()->user()->level==1)
                    <form class="form-inline  mt-1"  action="{{url('tanah')}}" method="GET">
                      <div class="input-group input-group">
                        <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari " aria-label="Search">
                          <div class="input-group-append">
                            <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                          </div>
                      </div>
                    </form>
                  @elseif(auth()->user()->level==2)
                    <form class="form-inline  mt-1"  action="{{url('t')}}" method="GET">
                      <div class="input-group input-group">
                        <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari" aria-label="Search">
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
              <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pemilik</th>
      <th scope="col">Alamat Pemilik</th>
      <th scope="col">Jenis Tanah	</th>
      <th scope="col">Ukuran Tanah (m2)	</th>
      <th scope="col">Status Kepemilikan</th>
      @if(auth()->user()->level==1)
      <th scope="col">Aksi</th>
      @endif

    </tr>
  </thead>
  <tbody>
    
  <?php $no = 1;?>
    @foreach($tanah as $value)
    <tr>
      <td scope="row">{{$no ++}}</td>
      <td scope="row">{{$value->NamaPemilik}}</td>
      <td scope="row">{{$value->AlamatPemilik}}</td>
      <td scope="row">{{$value->JenisTanah}}</td>
      <td scope="row">{{$value->UkuranTanah}}</td>
      <td scope="row">{{$value->Status}}</td>
      <td scope="row" class="text-center">
      @if(auth()->user()->level==1)
        <form action="{{ route('tanah.destroy',$value->id) }}" method="post">
            @csrf
            @method('delete')
              <a href="{{ route('tanah.edit',$value->id) }}" class=" btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
              <button type="submit" class="btn btn-danger btn-sm"  onclick="  return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="fa fa-trash "></i></button>
          </form>
      @endif
      </td>
      @endforeach
    </tr>
  </tbody>
</table>
            </div>
            {!! $tanah->links() !!}

      </div>
    </section>
    </div>
  </div>
@include('layouts.footer')
