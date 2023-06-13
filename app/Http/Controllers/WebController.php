<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;
use App\Models\PendudukSementara;
use App\Models\Kematian;
use App\Models\ProfileDesa;
use App\Models\User;
use App\Models\Pgmn;
class WebController extends Controller
{
    //
   public function index(){
    
    $jumlah_sudah = Penduduk::where('status_nikah','Sudah Kawin')->count(); 
    $jumlah_belum = Penduduk::where('status_nikah','Belum Kawin')->count(); 
    $ceraihidup = Penduduk::where('status_nikah','Cerai Hidup')->count(); 
    $ceraimati = Penduduk::where('status_nikah','Cerai Mati')->count(); 


    $jlh_pddk = DB::table('tb_penduduk')->count(); // Ubah 'nama_t
    $jlh_smtr = DB::table('penduduk_sementaras')->count(); // Ubah 'nama_t
    $jlh_kmtn = DB::table('kematian')->count(); // Ubah 'nama_t
    $jlh_staff = DB::table('users')->count(); // Ubah 'nama_t
    $pgumn = Pgmn::all();
    return view('website.pddk.index',
        ['jlh_pddk'=>$jlh_pddk,
         'jlh_kmtn'=>$jlh_kmtn,
         'jlh_smtr'=>$jlh_smtr ,
         'jlh_staff'=>$jlh_staff,
         'pgumn'=>$pgumn
        ],compact('jumlah_sudah', 'jumlah_belum',
        'ceraihidup','ceraimati')
    );
   }
   public function getInduk(){
    $tampilpenduduk = Penduduk::all();
    return view('website.pddk.induk')->with('tampilpenduduk', $tampilpenduduk);
}
public function gettamu(){
    $tamusementara =PendudukSementara::all();
    return view('website.pddk.tamu')->with('tamusementara', $tamusementara);
}
   public function getkematian(){
    $kematian = Kematian::all();
    return view('website.pddk.kematian')->with('kematian', $kematian);
}

public function profile(){
    $user = User::all();
    $profile = ProfileDesa::all();
    return view('website.profile.index',['profile'=>$profile, 'user'=>$user]);
} 

public function staff(){
    $user = User::all();
    return view('website.pddk.users',['user'=>$user]);
}

public function edit($id){
    $penguman = Pgmn::Find($id);
    return view('website.pgmn.show',compact('penguman'));
}
}