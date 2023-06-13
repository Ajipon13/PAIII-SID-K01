<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\User;
use App\Models\Pgmn;

use Illuminate\Support\Facades\DB;
// use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
   

    public function index() {

      $data = Penduduk::all();
  
      $pekerjaan = Penduduk::where('pekerjaan_penduduk','Direktur')->count();

      $jumlah_sudah = Penduduk::where('status_nikah','Sudah Kawin')->count(); 
      $jumlah_belum = Penduduk::where('status_nikah','Belum Kawin')->count(); 
      $ceraihidup = Penduduk::where('status_nikah','Cerai Hidup')->count(); 
      $ceraimati = Penduduk::where('status_nikah','Cerai Mati')->count(); 
      $jumlah_penduduk = DB::table('tb_penduduk')->count(); 
      $jumlah_sementara = DB::table('penduduk_sementaras')->count(); 
      $jumlah_kematian = DB::table('kematian')->count(); 
      $pengumuman = Pgmn::all();

      return view('layouts.master',[
        'jumlah_kematian'=>$jumlah_kematian,
        'jumlah_penduduk'=>$jumlah_penduduk, 
        'jumlah_sementara'=>$jumlah_sementara, 
        'pekerjaan'=>$pekerjaan ], 
      compact(
        'jumlah_sudah',
        'jumlah_belum',
        'pengumuman',
        'ceraihidup',
        'ceraimati'
    ));
    }

 
  public function profile(Request $request, $id){
    $user = auth()->user();
    $request->validate([
      'image' => 'image' 
    ]);

      $data = User::Find($id);
    if ($data->image != null || image != '') {
        Storage::delete($data->image);
     }

      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imageName = time().'.'.$image->getClientOriginalExtension();
          $image->storeAs('/public/image', $imageName); 
          $user->image = $imageName;
          $user->save();
        }
        return back();

}
}
