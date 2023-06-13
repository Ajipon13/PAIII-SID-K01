@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
       <section class="content">
        <div class="col-lg-12 margin-tb">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class=" bg-yellow shadow" style="border-radius:20px;">
                    <h3 class="text-center text-bold mt-2 ">Informasi Desa</h3>
                    </div>


                <div class="col-9 mt-2">
                    @if(auth()->user()->level==1)
                    <a href="{{ url('info/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="nav-icon fa fa-info-circle" aria-hidden="true"></i> Tambah Data Informasi</a>
                    @endif
                    @if(auth()->user()->level==2)
                        <a href="{{ url('export') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>excel  </a>
                    @endif
                </div>
     

           
                <div class="card-body">
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="280px">Action</th>
                        </tr>
                            <tr>
                                <td>Wemiles</td>
                                <td>Billy   </td>
                                <td>Timmmi</td>
                                <td>
                                    <form action="" method="post">
                                      
                                    </form>
                                </td>
                        </tr>
                    </table>
                </div>
       </section>
     </div>
</div>
@include('layouts.footer')