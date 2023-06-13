@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
   <div class="content">
      <section class="content">
         <ol class="breadcrumb float-sm">
            <a href="{{('/Dashboard/bedahara')}}" class="">Dashboard</a>>
            <a class=""> pengumuman</a>
         </ol>
        <div class="card ">
               <h3 class="text-bold container mt-2">{{$item->judul}}</h3> <hr>
            <div class="card-body">
               <samp>{{$item->deskripsi}}</samp>
            </div>
            <div class="container">
               Salam
                  {{Auth()->user()->username}}
               <hr>
               {{$item->tanggal}}
            </div>
        </div> 
       </section>
     </div>
</div>
@include('layouts.footer')