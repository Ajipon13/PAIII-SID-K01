@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
       <section class="content">
        <div class="col-lg-12 margin-tb">
        @if(session('success'))
            <div class="alert text-center"  style="background-color:#00BFFF;">
            <strong>{{session('success')}}</strong>
            </div>
          @endif
            <div class="card">
                <div class=" bg-yellow shadow" style="border-radius:20px;">
                    <h3 class="text-center text-bold mt-2 ">Profile Desa</h3>
                    </div>

                <div class="col-9 mt-2">
                    <a href="{{ url('profil/create') }}" class="ml-2 btn btn border border-success shadow btn-outline-success"><i class="nav-icon fa fa-plush" aria-hidden="true"></i> Tambah Profile Desa</a>
                   
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-responsive-lg">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th width="110px">Action</th>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach ($profdata as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->profile_desa}}</td>
                                <td>
                                  <img src="storage/profile_img/{{ $item->profile_img }}" style="width:200px; height:100px;">
                                <td>
                                <form action="{{ route('profil.destroy',$item->id)}}" method="post" class="text-center">
                                    <a href="{{ route('profil.edit',$item->id)}}" class="btn btn-sm btn-warning text-xs text-white"> <i class="fa fa-edit" aria-hidden="true"></i></a>
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" onclick=" return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-sm text-xs text-white" style="background-color:#FF7777;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                                </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
       </section>
     </div>
</div>
@include('layouts.footer')