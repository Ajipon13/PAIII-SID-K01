<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Penduduk as p;
use App\Models\Kematian;
use App\Models\Tamu;
use App\Models\Pgmn;
use App\Models\User;
use DB;


class KepdesController extends Controller
{
    //
  
    public function index() {
        $jumlah_sementara = DB::table('penduduk_sementaras')->count(); // Ubah 'nama_t
        $jumlah_kematian = DB::table('kematian')->count(); // Ubah 'nama_t
        $jumlah_sudah = p::where('status_nikah','Sudah Kawin')->count(); 
        $jumlah_belum = p::where('status_nikah','Belum Kawin')->count(); 
        $pekerjaan = p::where('pekerjaan_penduduk','Direktur')->count();

        $pgumn = Pgmn::all();
            $penduduk = p::all();
            return view('layouts.master', compact('penduduk','pgumn','jumlah_sementara','jumlah_kematian', 'jumlah_belum', 'jumlah_sudah','pekerjaan'));
        
    }

    public function edit($id){
        $item = Pgmn::Find($id);
        return view('pgmn.show', compact('item'));
    }

    public function ubah($id){
        return view('auth.password2');
    }

    public function profile(Request $request, $id){
        $request->validate([
            'image' => 'image',
        ]);
    
        $user = User::findOrFail($id);
    
        if ($request->hasFile('image')) {
            Storage::delete($user->image);
            $user->image = $request->file('image')->store('/public/image');
        }
    
        $user->save();
        return back();
    
    }

    public function update(Request $request, $id)
{
    
    $user = User::findOrFail($id);
    $request->validate([
        'username' => 'required|unique:users,username,'.$user->id,
        // 'password' => 'nullable|min:8|confirmed',
        'old_password' => 'current_password',
        'new_password' => 'confirmed',
    ]);
    
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->save();

    // if ($request->password) {
    // }
    return redirect()->back();


}

    
}
