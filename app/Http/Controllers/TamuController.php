<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\PendudukSementara;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use App\Exports\SementraExport;

class TamuController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $jumlah_tamu = PendudukSementara::where('nama_tamu','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $jumlah_tamu = PendudukSementara::paginate(10);
        }
        return view('dt_tamu.index',compact('jumlah_tamu'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dt_tamu.create');

    }

 
    public function store(Request $request){
        $validasi = $request->validate([
            'nik_tamu'=>'required|numeric|unique:penduduk_sementaras,nik_tamu',
            'nama_tamu'=>'required',
            'jk_tamu'=>'required',
            'asal'=>'required',
            'tanggal_datang'=>'required',
            'tanggal_balik'=>'required',
            'tujuan'=>'required',
            'ket'=>'required',

        ]);

       $validasi = PendudukSementara::create([
        'nik_tamu'=>$request->nik_tamu,
        'nama_tamu'=>$request->nama_tamu,
        'jk_tamu'=>$request->jk_tamu,
        'asal'=>$request->asal,
        'tanggal_datang'=>$request->tanggal_datang,
        'tanggal_balik'=>$request->tanggal_balik,
        'tujuan'=>$request->tujuan,	
        'ket'=>$request->ket
        ]);
       return redirect()->to('indextamu')->with('success','Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        {
           dd('SHOW me!');
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamu = PendudukSementara::FindOrFail($id);
        return view('dt_tamu.edit', compact('tamu'));
    }
     public function export()
    {
         return Excel::download(new SementraExport,'datatamu.xlsx');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nik_tamu' => 'required',
            'nama_tamu' => 'required',
            'jk_tamu' =>'required', 
            'asal' => 'required',
            'tujuan' => 'required',
            'ket' =>'required',
            'tanggal_datang' => 'required',
            'tanggal_balik' => 'required',
        ]);
        $tamu = PendudukSementara::find($id); 
                $tamu->nik_tamu = $request->nik_tamu ; 
                $tamu->nama_tamu = $request->nama_tamu ; 
                $tamu->jk_tamu = $request->jk_tamu ; 
                $tamu->asal = $request->asal ;
                $tamu->tujuan = $request->tujuan ;
                $tamu->ket = $request->ket ;
                $tamu->tanggal_datang = $request->tanggal_datang ;
                $tamu->tanggal_balik = $request->tanggal_balik ;
        $tamu->save(); 
        return redirect()->to('indextamu')->withSuccess('Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletetamu = PendudukSementara::find($id);
        $deletetamu->delete();
        return redirect()->to('indextamu')->with('delete','Dihapus!');
    }
}
