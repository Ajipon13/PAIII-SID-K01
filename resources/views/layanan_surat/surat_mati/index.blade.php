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
      <a class="">data surat kbm</a>
   @endif
   @if(session('success'))
      <div class="alert text-center"  style="background-color:#00BFFF;">
         <strong>{{session('success')}}</strong>
      </div>
   @endif
   <div class="card-header bg-warning text-center text-bold"  style="border-radius:20px;">
   SURAT KETERANGAN KEMATIAN
   </div>
   
   <div class="row">
      <div class="col-6">
         @if(auth()->user()->level ==1)
         <a href="{{ url('sm/create') }}" class=" mt-1 ml-2 btn btn border border-success shadow btn-outline-success"><i class="nav-icon fa fa-envelope" aria-hidden="true"></i> Buat Surat</a>
      </div>
      <div class="col-3">
      @endif
      @if(auth()->user()->level ==1)
               <form class="form-inline  mt-1"  action="{{url('sm')}}" method="GET">
                  <div class="input-group input-group">
                    <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari..." aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-navbar shadow rounded-circle text-dark" style="background-color:#81BC00;" type="submit">
                           <i class="fas fa-search"></i>
                        </button>
                     </div>
                  </div>
               </form>
      @elseif(auth()->user()->level ==2)
                <form class="form-inline  mt-1"  action="{{url('smeninggal')}}" method="GET">
                  <div class="input-group input-group">
                    <input class="form-control form-control-navbar shadow rounded" type="search" name="cari" placeholder="Cari..." aria-label="Search">
                     <div class="input-group-append">
                        <button class="btn btn-navbar shadow rounded-circle text-dark"  style="background-color:#81BC00;" type="submit">
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
                  <th>NAMA</th>
                  <th>SEBAB KEMATIAN</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
               </tr>
               <?php $no = 1;?>
               @foreach($datam as $itema)
                  <tr>
                     <td>{{$no++}}</td>
                     <td>{{$itema->nama_meninggal}}</td>
                     <td>{{$itema->sebab}}</td>
                     <td>                  
                        @if ($itema->approved)
                           <span style="color:#0F5486;">Disetujui</span>
                           @if(auth()->user()->level == 2)<!--
                           <form action="/sbk/{{ $itema->id }}/reject" method="post">
                          
                                 <input type="hidden" name="surat_id" value="{{ $itema->id }}">
                                 <button type="reset"class="btn btn-warning">Tolak</button>
                           </form> -->
                             @endif
                           @elseif(auth()->user()->level == 1)
                           <span style="color:#0BAE2F;">Menunggu...</span>
                           @endif
                        @if(auth()->user()->level == 2)
                        @if ($itema->approved)
                           @else
                           <span class="text-danger">Ditunggu persetujuan</span>
                           <form action="/sm/{{ $itema->id }}/approve" method="post">
                           @csrf
                           @method('put')
                                 <input type="hidden" name="surat_id" value="{{ $itema->id }}">
                                 <button type="submit" class="btn btn-success">Approve</button>
                           </form>
                           @endif
                          @endif
                     </td>
                     <td>
                        @if($itema->approved)
                        @if(auth()->user()->level == 1)
                              <a href="{{ url('smpdf',$itema->id) }} " class="text-warning btn-sm card bg-light mb-3 border border-warning" target="_blank" >Print</a>
                        @endif
                        @if(auth()->user()->level == 2)
                        <a href="{{ url('pdfsm',$itema->id) }} " class="text-warning btn-sm card bg-light mb-3 border border-warning" target="_blank" >Print</a>
                  @endif
                  @endif
                     </td>
                  </tr>
               @endforeach

            </table>
            {!! $datam->links() !!}
            </div>
         </div>
      </div>
      </div>
    </section>
    </div>
      </div>
      <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script> 
@include('layouts.footer')

