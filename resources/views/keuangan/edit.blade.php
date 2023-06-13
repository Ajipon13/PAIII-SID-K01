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
            <a  href="{{ url('keuangan') }}" class="">keuangan</a>>
            <a class="">edit keuangan</a>
            </ol>
          </div>
        @if(session('success'))
              <div class="alert text-center" role="alert" style="background-color:#00BFFF;">
            <strong>Keuangan {{session('success')}}</strong>
            </div>
          @endif

          <div class="card">    
            <div class="card-header">
              <h3 class="text-center text-bold mt-2 ">EDIT KEUANGAN</h3>
            </div>

          @if(session('delete'))
            <div class="alert alert-danger text-center">
            <strong>Keuangan </strong>{{session('delete')}}
            </div>
          @endif
      <div class="card-body mt-3">
     
    <form action="{{ route('keuangan.update',$edituang->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-sm">Tanggal : </label>
                <div class="col-sm-10">
                  <input type="date" name="tanggal" class="form-control" value="{{$edituang->tanggal}}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-sm">Keterangan:</label>
                <div class="col-10">
                  <input type="text" name="keterangan" class="form-control"  value="{{$edituang->keterangan}}">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-sm">Jenis Keuangan :</label>
                <div class="col-10">
                <select class="form-control " name="jenis" value="{{ $edituang->jenis }}">
                    <option value="pemasukkan">Pemasukkan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-sm">Jumlah :</label>
              <div class="col-10">
                <input type="text" class="form-control" name="jumlah" value="{{$edituang->jumlah}}">
              </div>
            </div>
            <div class="row">
              
            <div class="col-10"></div>
            <div class="col-2">
              <a href="{{ url('keuangan') }}" class="btn btn-danger btn-sm">KEMBALI</a>
              <button type="submit" class="btn-sm btn btn-primary">SIMAPN</button>
            </div>
            </div>
        </div>
    </div>
   
</form>
        </div>
        </div>
      </div>
    </section>
    </div>
  </div>
@include('layouts.footer')
