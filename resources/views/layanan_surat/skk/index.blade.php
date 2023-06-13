@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
   @if(auth()->user()->level == 1)
      <a href="/Dashboard/desa" class="">Dashboard</a>>
      <a href="/pjs" class="">layanan surat</a>>
      <a class="">data surat kbm</a>
   @elseif(auth()->user()->level == 2)
      <a href="/Dashboard/desa" class="">Dashboard</a>>
      <a href="/reguestsurat" class="">layanan surat</a>>
      <a class="">data surat kawin</a>
   @endif
   @if(session('success'))
      <div class="alert text-center"  style="background-color:#00BFFF;">
         <strong>{{session('success')}}</strong>
      </div>
   @endif
   <div class="card-header bg-warning text-center text-bold"  style="border-radius:20px;">
   SURAT KETERANGAN MENIKAH
   </div>
   
   <div class="row">
      <div class="col-6">
         @if(auth()->user()->level ==1)
         <a href="{{ url('skk/create') }}" class=" mt-1 ml-2 btn btn border border-success shadow btn-outline-success"><i class="nav-icon fa fa-envelope" aria-hidden="true"></i> Buat Surat</a>
      </div>
      <div class="col-3">
         <form class="form-inline  mt-1"  action="{{url('skk')}}" method="GET">
            <div class="input-group input-group">
               <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari..." aria-label="Search">
               <div class="input-group-append">
                  <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                     <i class="fas fa-search"></i>
                  </button>
               </div>
            </div>
         </form>
      </div>
      @endif
      @if(auth()->user()->level ==2)
      <div class="col-6">
         <form class="form-inline  mt-1"  action="{{url('suratnikah')}}" method="GET">
            <div class="input-group input-group">
               <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari..." aria-label="Search">
               <div class="input-group-append">
                  <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                     <i class="fas fa-search"></i>
                  </button>
               </div>
            </div>
         </form>
      </div>
      @endif
   </div>
   </div>

   <div class="row mt-1">
      <!-- Crypt::encry -->
      
      <div class="col-12 " >
         <div class="card">
            <div class="card-body">
            <table class="table table-bordered">
               <tr>
                  <th>No</th>
                  <th>NOMOR SURAT</th>
                  <th>NAMA LENGKAP</th>
                  <th>NAMA PASANGAN</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
               </tr>
               <?php $no = 1;?>
               @foreach($skk as $item)
                  <tr>
                     <td>{{$no++}}</td>
                     <td>{{$item->no}}</td>
                     <td>{{$item->nama}}</td>
                     <td>{{$item->nama_pasangan}}</td>
                    
                     <td>
                  @if ($item->approved)
                     <span style="color:#0F5486;">Disetujui</span>
                     @elseif(auth()->user()->level == 1)
                     <span style="color:#0BAE2F;">Menunggu...</span>
                     @endif
                  @if(auth()->user()->level == 2)
                  @if ($item->approved)
                     @else
                     <span class="text-danger">Ditunggu persetujuan</span>
                     <form action="/skk/{{ $item->id }}/approve" method="post">
                     @csrf
                     @method('put')
                           <input type="hidden" name="surat_id" value="{{ $item->id }}">
                           <button type="submit" class="btn btn-success">Approve</button>
                     </form>
                     @endif
                 @endif
                  </td>
                     <td>
                  @if($item->approved)
                  @if(auth()->user()->level == 1)
                        <a href="{{ url('skk',$item->id) }} " class="text-warning btn-sm card bg-light mb-3 border border-warning" target="_blank" >Print</a>
                  @endif
                  @if(auth()->user()->level == 2)
                        <a href="{{ url('pdfskk',$item->id) }} " class="text-warning btn-sm card bg-light mb-3 border border-warning" target="_blank" >Print</a>
                  @endif
                  @endif
                     </td>
                  </tr>
               @endforeach

            </table>
            </div>
         </div>
      </div>
      </div>
    </section>
    </div>
      </div>
      <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script> 
@include('layouts.footer')

