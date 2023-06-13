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
            <a class="">index tamu</a>
            </ol>
          </div>
        @if(session('success'))
              <div class="alert text-center" role="alert" style="background-color:#00BFFF;">
            <strong>Tamu Berasil {{session('success')}}</strong>
            </div>
          @endif

          <div class="card">    
            <div class="card bg-yellow shadow" style="border-radius:20px;">
              <h3 class="text-center text-bold mt-2 ">DATA PENDUDUK TAMU</h3>
            </div>

          @if(session('delete'))
            <div class="alert alert-danger text-center">
            <strong>Tamu Berasil </strong>{{session('delete')}}
            </div>
          @endif
      
            <!-- /.card-header -->          
            <div class="col-sm-12">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">

                    <div class="col-10">
                          @if(auth()->user()->level==1)
                            <a href="{{ url('tamu.create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success text-dark" ><i class="fa fa-user-plus" aria-hidden="true"></i>Tambah Tamu</a>
                            <a href="{{ url('tamuexport') }}" class="ml-2 btn btn border border-success shadow btn-outline-success text-dark"><i class="fa fa-download" aria-hidden="true"></i>excel </a>
                          @elseif(auth()->user()->level==2)
                            <a href="{{ url('excel') }}" class="ml-2 btn btn border border-success shadow btn-outline-success text-dark"><i class="fa fa-download" aria-hidden="true"></i>excel </a>
                            @endif

                    </div>
                  <div class="col-2">
                  <form class="form-inline  mt-1"  action="{{url('indextamu')}}" method="GET">
                            <div class="input-group input-group">
                        <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari..." aria-label="Search">
                              <div class="input-group-append">
                                <button class="btn btn-navbar shadow rounded-circle text-dark"  style="background-color:#81BC00;"  type="submit">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                  </div>
              <div class="col-sm-12 mt-2">
              <table class="table table-bordered">
            <thead class="text-center ">
              <th>NO</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>JENIS KELAMIN</th>
              <th>DATANG DARI</th>
              <th>DATANG TANGGAL</th>
              <th>PERGI TANGGAL</th>
              <th>MAKSUD & TUJUAN</th>
              <th>KETERAGAN</th>
              <th>OPSI</th>
            </thead>
            <?php $no = 1; ?>
            @foreach($jumlah_tamu as $no => $tamu)
                <tbody>
                  <tr>
                    <td>{{($no + $jumlah_tamu -> firstItem())}}</td>
                    <td>{{$tamu->nik_tamu}}</td>
                    <td>{{$tamu->nama_tamu}}</td>
                    <td>{{$tamu->jk_tamu}}</td>
                    <td>{{$tamu->asal}}</td>
                    <td>{{$tamu->tanggal_datang}}</td>
                    <td>{{$tamu->tanggal_balik}}</td>
                    <td>{{$tamu->tujuan}}</td>
                    <td>{{$tamu->ket}}</td>
                    <td>
                        <form action="{{ url('deletetamu',$tamu->id) }}" method="POST">
                            <a href="{{ url('tamu.edit',$tamu->id) }}"  class="btn btn-sm text-xs text-white" style="background-color:#FFC93C;"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                @csrf 
                                @method('delete')
                            <button type="submit" onclick=" return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-sm text-xs text-white" style="background-color:#FF7777;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                          </form>  
                    </td>
                  </tr> 
                </tbody>
                @endforeach
              </table>
              Jumlah data : {{$jumlah_tamu->count()}}
              <div class="text-center">
              {!! $jumlah_tamu->links() !!}
                
              </div>
        </div>
      </div>
    </section>
    </div>
  </div>
@include('layouts.footer')


