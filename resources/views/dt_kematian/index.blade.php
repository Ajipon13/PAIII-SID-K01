@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
  <div class="content-header">
  <a href="{{ url('Dashboard/admin') }}" class="">Dashboard</a>>
   <a class="">data kematian</a>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- TAMPILKAN DATA WEMILES YIKWA -->
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
          <div class="card">
            <div class="card bg-yellow shadow" style="border-radius:20px;">
              <h3 class="text-center text-bold mt-2 ">DATA KEMATIAN</h3>
            </div>

            <!-- /.card-header -->          
            <div class="col-sm-12">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">

                    <div class="col-10">
                      @if(auth()->user()->level==1)
                      <a href="{{ url('kematian/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success  text-dark"><i class="fa fa-user-plus" aria-hidden="true"></i>Tambah Data kematian</a>
                      <a href="{{ url('exportmati') }}" class="ml-2 btn btn border border-success shadow btn-outline-success  text-dark"><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                        @endif
                        @if(auth()->user()->level==2)
                            <a href="{{ url('export') }}" class="ml-2 btn btn border border-success shadow btn-outline-success  text-dark"><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                        @endif
                          </div>
                  <div class="col-2">
                        @if(auth()->user()->level==1)
                  <form class="form-inline  mt-1" action="{{url('kematian')}}" method="GET">
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
                  <form class="form-inline  mt-1" action="{{url('datakematian')}}" method="GET">
                            <div class="input-group input-group">
                            <input class="form-control form-control-navbar shadow rounded-pill" name="cari" type="search" placeholder="Cari..." aria-label="Search">
                              <div class="input-group-append">
                                <button class="btn btn-navbar shadow rounded-circle text-dark"  style="background-color:#81BC00;" type="submit">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        @endif
                  </div>
              <div class="col-sm-12 mt-2">
              <table class="table table-bordered text-center">
                  <thead>
                    <th colspan="4"></th>
                    <th colspan="2">LAHIR</th>
                    <th colspan="2">MENINGGAL</th>
                  </thead>
                  <tr>
                    <thead>
                      <th rowspan="3">NO</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>JENIS KELAMIN</th>
                      <th>TEMPAT</th>
                      <th>TANGGAL</th>
                      <th>TEMPAT</th>
                      <th>TANGGAL</th>
                      <th colspan="2">KETERAGAN</th>
                    @if(auth()->user()->level==1)
                      <th colspan="2">AKSI</th>
                    @endif
                    </thead>
                  </tr> 
                  <tbody >
                    <?php $no = 0?>
                  @foreach($datamati as $item)
                      <tr>
                        <td>{{($no + $datamati -> firstItem())}}</td>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->nama_}} </td>
                        <td>{{$item->jenis_kelamin}} </td>
                        <td>{{$item->tempat_lahir}} </td>
                        <td>{{$item->tgl_lahir}} </td>
                        <td>{{$item->tempat_wafaat}} </td>
                        <td>{{$item->tgl_wafaat}} </td>
                        <td colspan="3" >{{$item->ket}}</td>
                        <td>
                      @if(auth()->user()->level==1)
                          <a href=" {{ route('kematian.edit',$item->id) }}" class="btn btn-xs btn-sm" style="background-color:#FFC93C;"><i class="fa fa-edit"></i></a>
                          <a href=" {{url('kematian.destroy',$item->id)}}"  onclick="  return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-xs btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      @endif
                        </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              Jumlah data : {{$datamati->count()}}
              <div class="text-center">
              </div>
        </div>
      </div>
    </section>
    </div>
        <!-- /.col -->
      </div>

          <!-- TUTUP TAMPILKAN DATA WEMILES YIKWA -->

@include('layouts.footer')
