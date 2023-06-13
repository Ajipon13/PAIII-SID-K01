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
            <a class="">keuangan</a>
          </ol>
      </div>
        @if(session('success'))
              <div class="alert text-center" role="alert" style="background-color:#00BFFF;">
            <strong>{{session('success')}}</strong>
            </div>
          @endif

    <div class="card">    
    <div class="card bg-yellow shadow" style="border-radius:20px;">
        <h3 class="text-center text-bold mt-2 ">DATA KEUANGAN</h3>
    </div>

    <div class="col-sm-12">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-9">
                <a href="{{ url('keuangan/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success" ><i class="fa fa-plus" aria-hidden="true"></i>Tambah/Kurang Keuangan</a>
                <a href="{{ url('keuangan/show')}}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>excel</a>
            </div>
            <div class="col-sm-12 mt-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
        <h4>Data Pemasukk Keuangan Desa</h4>
        <hr>
     <tbody>
        @foreach($pemasukkan1 as $masuk)
        <tr>
            <td>{{ $masuk->tanggal }}</td>
            <td>{{ $masuk->keterangan }}</td>
            <td>{{ $masuk->jumlah }} </td>
            <td>
                <form action="{{ route('keuangan.destroy',$masuk->id) }}" method="POST">
                    <!-- <a class="btn btn-info btn-sm " href="{{ route('keuangan.show',$masuk->id) }}">Show</a> -->
                    <a class="btn btn-warning btn-sm text-white" href="{{ route('keuangan.edit',$masuk->id) }}"> <i class="fa fa-edit fa-sm"></i> Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm " onclick=" return confirm('Apakah anda yakin Menhapus data ini?');"><i class="fa fa-trash fa-sm"></i> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3"><strong>Total Pemasukan</strong></td>
            <td><strong>Total Pemasukan : {{  $pemasukkan }}</strong></td>            
        </tr>
    </tbody>    
    </tbody>

</table>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <h4>Data Pengeluaran Keuangan Desa</h4>        
    <hr>
    <tbody>
        @foreach($pengeluaran1 as $keluar)
        <tr>
            <td>{{ $keluar->tanggal }}</td>
            <td>{{ $keluar->keterangan }}</td>
            <td>{{ $keluar->jumlah }} </td>
            <td>
                <form action="{{ route('keuangan.destroy',$keluar->id) }}" method="POST">
                    <!-- <a class="btn btn-info btn-sm " href="{{ route('keuangan.show',$keluar->id) }}">Show</a> -->
                    <a class="btn btn-warning btn-sm text-white" href="{{ route('keuangan.edit',$keluar->id) }}"> <i class="fa fa-edit fa-sm"></i> Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm " onclick=" rentrun confirm('Apakah anda yakin Menhapus data ini?');" ><i class="fa fa-trash fa-sm"></i> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        <tfoot>    
            <tr>
                <td colspan="3"><strong>Total Pengeluaran</strong></td>
                <td><strong>Total Pengeluaran: {{  $pengeluaran }}</strong></td>            
            </tr>
            <tr>
                <td colspan="3"><strong>Total saldo</strong></td>
                <td><strong>Sisa Saldo: {{ $saldo }}</strong></td>            
            </tr>
        </tfoot>
</table>
        <div class="text-center">
        </div>
      </div>
    </div> 
   </section>
 </div>
</div>
@include('layouts.footer')
