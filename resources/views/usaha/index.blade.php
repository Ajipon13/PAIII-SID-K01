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
            <a class="">tempat usaha</a>
            </ol>
          </div>
        @if(session('success'))
              <div class="alert text-center" role="alert" style="background-color:#00BFFF;">
            <strong>{{session('success')}}</strong>
            </div>
          @endif

          <div class="card">    
            <div class="card bg-yellow shadow" style="border-radius:20px;">
              <h3 class="text-center text-bold mt-2 ">Tempat Usaha Di Desa</h3>
            </div>
            <!-- /.card-header -->          
            <div class="col-sm-12">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">

                    <div class="col-9">
                    @if(auth()->user()->level==1)
                      <a href="{{ url('t_usaha/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success" ><i class="nav-icon fas fa-plus text-sm"></i>  Tambah Tempat Data Usaha</a>
                    @endif  
                      <a href="{{ url('t_usaha/show') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>excel</a>

                    </div>
                  <div class="col-3">
                  <form class="form-inline  mt-1"  action="{{url('t_usaha')}}" method="GET">
                            <div class="input-group input-group">
                            <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari" aria-label="Search">
                              <div class="input-group-append">
                                <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                  </div> 
              <div class="col-sm-12 mt-2">
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Usaha</th>
                  <th>Jumlah</th>
                  <th>Lokasi</th>
                  @if(auth()->user()->level==1)
                  <th>Opsi</th>
                  @endif
                </tr>
              </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($usaha as $item)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->jenis_usaha}}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>{{$item->Lokasi}}</td>
                    <td>
                    @if(auth()->user()->level==1)
                        <form action="{{ route('t_usaha.destroy',$item->id)}}" method="POST">
                            <a href="{{ route('t_usaha.edit',$item->id)}}"  class="btn btn-sm text-xs text-white" style="background-color:#FFC93C;"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                @csrf 
                                @method('delete')
                            <button type="submit" onclick=" return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-sm text-xs text-white" style="background-color:#FF7777;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                          </form>  
                    @endif      
                    </td>
                  </tr> 
                  @endforeach
                </tbody>
             
              </table>
   
        </div>
        {!! $usaha->links() !!}

      </div>
    </section>
    </div>
  </div>
@include('layouts.footer')
