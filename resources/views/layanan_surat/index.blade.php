@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
<section class="content">
<a href="/admin" class="">Dashboard</a>>
   <a class="">layanan surat</a>
      <div class="card-header bg-warning text-center text-bold">
         LAYANAN SURAT 
      </div>
      <div class="row mt-2 ">
 
        <div class="col-2">
            <div class="card">
            @if(auth()->user()->level == 1)
               <a href="{{ url('skbb') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p class="text-sm">
                  SURAT KETERANGAN BERKELAKUAN BAIK
                </p>
               </a>
            @elseif(auth()->user()->level == 2)
               <a href="{{ url('skbaik') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p class="text-sm">
                  SURAT KETERANGAN BERKELAKUAN BAIK
                </p>
               </a>
            @endif

            </div>
        </div>

        <div class="col-2 ">
            <div class="card">
            @if(auth()->user()->level == 1)
               <a href="{{ url('ktp') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT PENGANTAR KTP
                  </p>
               </a>
            @elseif(auth()->user()->level == 2)
               <a href="{{ url('surat_ktp') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT PENGANTAR KTP
                  </p>
               </a>
            @endif

            </div>
        </div>
        
        <div class="col-2">
            <div class="card">
            @if(auth()->user()->level == 1)
               <a href="{{ url('sbk') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN BELUM PERNAH KAWIN
                  </p>
               </a>
            @elseif(auth()->user()->level == 2)
               <a href="{{ url('suratnikah') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN BELUM PERNAH KAWIN
                  </p>
               </a>
            @endif
            </div>
        </div>
    
        <div class="col-2">
            <div class="card">
               <a href="{{ url('skkm') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN KURANG MAMPU
                  </p>
               </a>
            </div>
            
        </div>
            <br>

        <div class="col-2">
            <div class="card">
            @if(auth()->user()->level == 1)
               <a href="{{ url('skk') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN KAWIN
                  </p>
               </a>
               @elseif(auth()->user()->level == 2)
               <a href="{{ url('suratketkwn') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN KAWIN
                  </p>
               </a>
            @endif
            </div>
        </div>
        <br>

        <div class="col-2">
            <div class="card">
            @if(auth()->user()->level == 1)
               <a href="{{ url('domisili') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN PINDAH 
                  </p>
               </a>
            @elseif(auth()->user()->level == 2)               
            <a href="{{ url('suratpindah') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN PINDAH 
                  </p>
               </a>
               @endif
            </div>
        </div>
        
        <div class="col-2">
            <div class="card">
               @if(auth()->user()->level ==1)
               <a href="{{ url('su')}}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN USAHA 
                  </p>
               </a>
               @elseif(auth()->user()->level == 2) 
               <a href="{{ url('suratusaha')}}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN USAHA 
                  </p>
               </a>
            @endif
            </div>
        </div>
        
        <div class="col-2">
            <div class="card">
            @if(auth()->user()->level == 1)
            <a href="sm" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning text-black" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN KEMATIAN 
                  </p>
               </a>
            @elseif(auth()->user()->level == 2) 
               <a href="{{ url('smeninggal') }}" class="text-center " style="text-color:black;">
                  <i class="fa fa-folder-open fa-6x text-warning text-black" aria-hidden="true"></i><br>
                  <p  class="text-sm">
                  SURAT KETERANGAN KEMATIAN 
                  </p>
               </a>
            @endif
            </div>
        </div>
        
       </div>
     </section>
    </div>
  </div>


@include('layouts.footer')
