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
            <a  href="{{ url('danadesa') }}" class="">dana desa</a>>
            <a class="">dana</a>
            </ol>
          </div>
        @if(session('success'))
              <div class="alert text-center" role="alert" style="background-color:#00BFFF;">
            <strong>Keuangan {{session('success')}}</strong>
            </div>
          @endif
          @if(session('delete'))
            <div class="alert alert-danger text-center">
            <strong>Keuangan </strong>{{session('delete')}}
            </div>
          @endif
          <div class="card">    
            <div class="card-header" >
              <h3 class="text-center text-bold ">TAMBAH DANA DESA</h3>
            </div>
      <div class="card-body mt-3">

          <form action="{{route('danadesa.store')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group row">
                    <label for="" class="col-2">Tanggal</label>
                    <div class="col-10">
                         <input type="date" name="tanggal" class="form-control">
                    </div>
                    
              </div>
              <div class="form-group row">
                    <label for="" class="col-2">Harga</label>
                    <div class="col-10">
                         <input type="number" name="harga" class="form-control">
                    </div>
                    
              </div>
              <div class="form-group row">
                    <label for="" class="col-2">Pemasukkan</label>
                    <div class="col-10">
                      <input type="number" step="0.01" id="pemasukkan" name="pemasukkan" class="form-control">
                    </div>
                    
              </div>
              <div class="form-group row">
                    <label for="" class="col-2">Pengeluaran</label>
                    <div class="col-10">
                      <input type="number" step="0.01" id="pengeluaran" name="pengeluaran" class="form-control">
                    </div>
                    
              </div>
              <div class="form-group row">
                    <label for="" class="col-2">Jumlah</label>
                    <div class="col-10">
                     <input type="text" id="jumlah" name="jumlah" readonly class="form-control">
                    </div>
                    
              </div>
             <div class="row">
             <div class="col-9"></div>
              <div class="col-3">
              <div class="form-group ">
                    <button type="submit" class="btn btn-info">SIMPAN</button>
                    <a href="{{ url('danadesa') 
                    }}" class="btn btn-danger">KEMBALI</a>
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

  <script>
    function calculateTotal()
    {
      var pemasukkan = parseFloat(document.getElementById("pemasukkan").value);
      var pengeluaran = parseFloat(document.getElementById("pengeluaran").value);
      var jumlah = pemasukkan + pengeluaran;
      document.getElementById("jumlah").value = jumlah.toFixed(2);
    }
    document.querySelector('form').addEventListener('input', calculateTotal);

  </script>

@include('layouts.footer')
