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
            <a class="">index Penduduk</a>
            </ol>
          </div>
    @if(session('success'))
      <div class="alert text-center"  style="background-color:#00BFFF;">
      <strong>{{session('success')}}</strong>
      </div>
    @endif
  <div class="card">
      <div class="card bg-yellow shadow" style="border-radius:20px;">
        <h3 class="text-center text-bold mt-2 ">DATA PENDUDUK INDUK</h3>
      </div>
    <div class="col-sm-12">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-9">
                @if(auth()->user()->level==1)
                  <a href="{{ url('penduduk/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success text-dark"  ><i class="fa fa-user-plus" aria-hidden="true"></i>Tambah Penduduk</a>
                  <a href="{{ url('dataexport') }}" class="ml-2 btn btn border border-success shadow btn-outline-success  text-dark"><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                  @endif
                  @if(auth()->user()->level==2)
                  <a href="{{ url('cetak') }}" class="ml-2 btn btn border border-success shadow btn-outline-success "><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                @endif
            </div>
          <div class="col-3">
            @if(auth()->user()->level==1)
              <form class="form-inline  mt-1" action="{{url('penduduk')}}" method="GET">
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
              <form class="form-inline  mt-1" action="{{url('datapenduduk')}}" method="GET">
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
        <table class="table table-bordered">
            <thead>
              <th>NO</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>JENIS KELAMIN</th>
              <th>AGAMA</th>
              <th>STATUS</th>
              <th>PEKERJAAN</th>
              <th>DUSUN</th>
              <th>RT</th>
              <th>RW</th>
              <th>TEMPAT LAHIR</th>
              <th>TANGGAL LAHIR</th>
            @if(auth()->user()->level==1)
              <th colspan="2" class="text-center">OPSI</th>
            @endif
          </thead>
            <?php $no = 1; ?>
            @foreach($tampilpenduduk as $tampil)
                <tbody >
                  <tr>
                    <td>{{($no ++)}}</td>
                    <td>{{$tampil->nik_penduduk}}</td>
                    <td>{{$tampil->nama_penduduk}}</td>
                    <td>{{$tampil->jk_penduduk}}</td>
                    <td>{{$tampil->agama_penduduk}}</td>
                    <td>{{$tampil->status_nikah}}</td> 
                    <td>{{$tampil->pekerjaan_penduduk}}</td>
                    <td>{{$tampil->dusun_penduduk}}</td>
                    <td>{{$tampil->tr_penduduk}}</td>
                    <td>{{$tampil->rw_penduduk}}</td>
                    <td>{{$tampil->tempat_lahir_penduduk}}</td>
                    <td>{{$tampil->tanggal_lahir_penduduk}}</td>
                    <td>
                  @if(auth()->user()->level==1)
                    <form action="{{ route('penduduk.destroy',$tampil->id) }}" method="POST">
                      <a href=" {{ route('penduduk.edit',$tampil->id)}}" class="btn btn-sm text-xs text-white"  style="background-color:#FFC93C;" ><i class="fa fa-edit"></i></a>
                      @csrf 
                      @method('delete')
                        <button type="submit" onclick=" return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-sm text-xs text-white" style="background-color:#FF7777;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>  
                      @endif
                    </td>
                  </tr> 
                </tbody>
                @endforeach
              </table>
              Jumlah data : {{$tampilpenduduk->count()}}
              <div class="text-center text-xs">
                {!! $tampilpenduduk->links() !!}
              </div>
        </div>
      </div>
    </section>
    </div>
        <!-- /.col -->
      </div>
 <!-- TUTUP TAMPILKAN DATA WEMILES YIKWA -->

@include('layouts.footer')

