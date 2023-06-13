@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<section class="content">
      <div class="row">
        <div class="col-12">
          
        <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a class="">index struktur organisasi</a>
            </ol>
          </div>
          <!-- /.card -->
          @if(session('success'))
            <div class="alert text-center"  style="background-color:#00BFFF;">
            <strong>{{session('success')}}</strong>
            </div>
          @endif

          <!-- TAMPILKAN DATA WEMILES YIKWA -->
          <div class="card">
            <div class="card bg-yellow shadow" style="border-radius:20px;">
      
              <h3 class="text-center text-bold mt-2 ">STRUKTUR ORGANISASI DESA</h3>
            </div>
      
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
                            <a href="{{ url('strukt/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="nav-icon fa fa-bezier-curve"></i>Buat Struktur Desa</a>
                    </div>
                  <div class="col-3">
                  </div>
                    <div class="col-sm-12 mt-2">
                   <table class="table table-bordered  text-center">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Tahun Agaran</th>
                        <th>GAMBAR</th>
                        <th>OPSI</th>
                      </tr>
                    </thead>
                    <tbody>      
                     <tr>
                    <?php $no = 1; ?>
                        @foreach($struk as $item)
                          <td>{{$no++}}</td>
                          <td>{{$item->tahun}}</td>
                          <td><img src="/gambar/{{ $item->gambar }}" width="100px"></td>
                          <td>
                            <form action="{{ route('strukt.destroy',$item->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                                <a href="{{ route('strukt.edit',$item->id) }}" class=" btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"  onclick="  return confirm('Apakah Anda Yakin Menghapus Data?');"><i class="fa fa-trash "></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                    </table>
              <div class="text-center text-xs">
              </div>
        </div>
      </div>
    </section>
    </div>
        <!-- /.col -->
      </div>
 <!-- TUTUP TAMPILKAN DATA WEMILES YIKWA -->

@include('layouts.footer')

