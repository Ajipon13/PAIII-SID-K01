@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
   <a href="/admin" class="">Dashboard</a>>
   <a class="">layanan surat</a>
   
   @if(session('success'))
      <div class="alert text-center"  style="background-color:#00BFFF;">
         <strong>Success! </strong>{{session('success')}}
      </div>
   @endif
   <div class="card-header bg-warning text-center text-bold"  style="border-radius:20px;">
      LAYANAN SURAT
   </div>
   
   <div class="row">
      <div class="col-6">
         @if(auth()->user()->level ==1)
         <a href="{{ url('surat/create') }}" class=" mt-1 ml-2 btn btn border border-success shadow btn-outline-success"><i class="nav-icon fa fa-envelope" aria-hidden="true"></i> Buat Surat</a>
      </div>
      @endif
   </div>
   </div>
     
   <div class="row mt-1">
      <!-- Crypt::encry -->
      
      <div class="col-12" >
         <div class="card">
            <table class="table table-bordered">
               <tr>
                  <th>#</th>
                  <th>Oleh</th>
                  <th>Tanggal</th>
                  <th>Jenis Surat</th>
                  <th>Status</th>
                  <th>Aksi</th>
               </tr>
               <?php $no = 1;?>
               @foreach($surat as $item)
                  <tr>
                     <td>{{$no++}}</td>
                     <td>
                        {{$item->nama}}
                     </td>
                     <td >{{$item->tanggal}}</td>
                     <td >{{$item->kategori}}</td>
                     <td>
                  @if ($item->approved)
                     <span class="text-success">Disetujui</span>
                     @else
                     <span class="text-danger">Belum Disetujui</span>
                     @endif
                  @if(auth()->user()->level == 2)
                  @if ($item->approved)
                     <span class="text-success">Disetujui</span>
                     @else
                     <span class="text-danger">Ditunggu persetujuan</span>
                     <form action="/surat/{{ $item->id }}/approve" method="post">
                     @csrf
                     @method('put')
                           <input type="hidden" name="surat_id" value="{{ $item->id }}">
                           <button type="submit" class="btn btn-success">Approve</button>
                     </form>
                     @endif
                 @endif
                  </td>
                     <td>
                  @if(auth()->user()->level == 1)
                  <a href="{{ route('surat.edit',$item->id) }} " class="text-dark btn-sm "><i class="fa fa-pen fa-1x text-warning" aria-hidden="true"></i></a>|
                  @endif
                  @if(auth()->user()->level == 2)
                  <a href="{{ url('surat/show',$item->id) }}" class="text-dark btn-sm " ><i class="fa fa-eye fa-1x text-info" aria-hidden="true"></i> </a>|
                  @endif
                  
                  @if($item->approved)
                  <a href="{{ route('surat.show',$item->id) }}" class="text-dark btn-sm " target="_blank"  ><i class="fa fa-eye fa-1x text-info" aria-hidden="true" ></i> </a>|
                           <a href="{{ url('download',$item->id) }} " class="text-dark btn-sm " target="_blank"><i class="fa fa-download fa-1x text-secondary" aria-hidden="true"></i></a>
                           @endif
                     </td>
                  </tr>
               @endforeach

            </table>
            
         </div>
      </div>

   
      </div>
    </section>
    </div>
        <!-- /.col -->
      </div>

      <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script> 
@include('layouts.footer')

