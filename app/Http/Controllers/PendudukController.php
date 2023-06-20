<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use DB;

use App\Exports\PendudukExport;
use Maatwebsite\Excel\Facades\Excel;


class PendudukController extends Controller 
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $tampilpenduduk = Penduduk::where('nama_penduduk','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $tampilpenduduk = Penduduk::paginate(10);
        }
        return view('dt_penduduk/index',compact('tampilpenduduk'))->with((request()->input('page',1)-0)*5);
    }


    public function create()
    {
        return view('dt_penduduk.create');
    }

    public function store(Request $request){

        $request->validate([
            'nik_penduduk' => 'required|between:16,16',
            'nama_penduduk' => 'required',
            'jk_penduduk' => 'required',
            'agama_penduduk' => 'required',
            'status_nikah' => 'required',
            'pekerjaan_penduduk' => 'required',
            'dusun_penduduk' => 'required',
            'tr_penduduk' => 'required',
            'rw_penduduk' => 'required',
            'tempat_lahir_penduduk' => 'required',
            'tanggal_lahir_penduduk' => 'required|date',
        ]);

       $data = Penduduk::create([
        'nik_penduduk'=>$request->nik_penduduk,
        'nama_penduduk'=>$request->nama_penduduk,
        'jk_penduduk'=>$request->jk_penduduk,
        'agama_penduduk'=>$request->agama_penduduk,
        'status_nikah'=>$request->status_nikah,
        'pekerjaan_penduduk'=>$request->pekerjaan_penduduk,
        'dusun_penduduk'=>$request->dusun_penduduk,
        'tr_penduduk'=>$request->tr_penduduk,
        'rw_penduduk'=>$request->rw_penduduk,
        'tempat_lahir_penduduk'=>$request->tempat_lahir_penduduk,
        'tanggal_lahir_penduduk'=>$request->tanggal_lahir_penduduk,
        ]);
        return redirect('/penduduk')->with('success','Data penduduk berasil ditambahkan');
       
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $update = Penduduk::findOrFail($id);
        return view('dt_penduduk.edit')->with('update', $update);
        
    }
    
    
    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'nik_penduduk' => 'required',
            'nama_penduduk' => 'required',
            'jk_penduduk' => 'required',
            'agama_penduduk' => 'required',
            'status_nikah' => 'required',
            'pekerjaan_penduduk' => 'required',
            'dusun_penduduk' => 'required',
            'tr_penduduk' => 'required',
            'tempat_lahir_penduduk' => 'required',
            'tanggal_lahir_penduduk' => 'required'
        ]);
        $penduduk->update($request->all());
        return redirect()->route('penduduk.index')->withSuccess('Data Penduduk berasil di edit');
          
    }

    public function destroy($id)
    {
        $hapusDatapenduduk = Penduduk::find($id);
        $hapusDatapenduduk->delete();
        return redirect()->to('penduduk')->with('delete','Data berasil dihapus!');
    }

    public function export()
    {
         return Excel::download(new PendudukExport,'datapenduduk.xlsx');
    }

    
    public function getPddk(){
        $webppk = Penduduk::all();
        return view('website.pddk.pddk',compact('webppk'));
    }
}
