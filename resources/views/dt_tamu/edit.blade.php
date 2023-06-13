@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
        
<!-- HALAMAN CREATE DATA -->
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="row">
    <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{('Dashboard/admin')}}" class="">Dashboard</a>>
            <a href="/indextamu" class="">index tamu</a>>
            <a class="">edit tamu</a>
            </ol>
          </div>
<div class="container">
    
       <div class="card">
          <div class="catd-header">
               <h4 class="text-center mt-2">Edit Data Tamu</h4>
               <hr>
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
          <div class="container">
          <form action="{{ url('updatetamu',$tamu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
             <div class="row">

                 <div class="col">
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label text-sm" >Nik</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control form-control-lg" autofocus name="nik_tamu" id="nik_tamu" value="{{$tamu->nik_tamu}}" >
                     </div>
                    </div>

              <div class="form-group  row">
                  <label for="nama" class="col-sm-2 col-form-label text-sm">Nama</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control form-control-lg" id="nama_tamu" name="nama_tamu" value="{{$tamu->nama_tamu}}">
                  </div>
              </div>
            
              <div class="form-group row">
                  <label for="jenis" class="col-sm-2 col-form-label text-sm">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <select class="form-control form-control-lg" name="jk_tamu">
                        <option value="{{$tamu->jk_tamu}}">{{$tamu->jk_tamu}}</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
              </div>

              <div class="form-group  row">
                  <label for="nama" class="col-sm-2 col-form-label text-sm">Datang Dari</label>
                    <div class="col-sm-10">
                         <input type="name" class="form-control form-control-lg" id="asal" name="asal" value="{{$tamu->asal}}">
                  </div>
              </div>
              
            </div>
               <div class="col">

                  <div class="form-group row">
                        <div class="col-sm-10"> 
                            <input type="date" class="form-control form-control-lg datepicker" id="tanggal_datang" name="tanggal_datang" value="{{$tamu->tanggal_datang}}">
                        </div>
                        <label for="tanggal_datang" class="col-2 col-form-label text-sm">Datang Tanggal</label>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="date" class="form-control form-control-lg datepicker" id="tanggal_balik" name="tanggal_balik" value="{{$tamu->tanggal_balik}}">
                        </div>
                        <label for="tanggal_balik" class=" text-sm">Rencana Balik</label>
                    </div>

                   <div class="form-group row">
                       <div class="col-sm-10">
                          <input type="text" class="form-control form-control-lg" name="tujuan" id="tujuan" value="{{$tamu->tujuan}}" >
                        </div>
                        <label for="exampleInputEmail1" class="col-2 col-form-label text-sm">Masud/ Tujuan</label>
                   </div>
            
                   <div class="form-group row">
                   <div class="col-sm-10">
                       <textarea type="text" class="form-control form-control-lg" id="ket" name="ket" aria-describedby="ket" >{{$tamu->ket}}</textarea>
                    </div>
                    <label for="exampleInputEmail1" class="text-sm">Keteragan</label>
                    </div>
                    
              </div>
            </div>
      
                     <div class="row">
                           <div class="col-9"></div>
                           <div class="col-3">
                             <button type="submit" class="btn btn-success btn-bg">SIMPAN</button>
                            <a href="{{ url('indextamu')}}" class="btn btn-danger btn-bg">BATAL</a>
                           </div>
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