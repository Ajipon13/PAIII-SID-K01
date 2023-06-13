<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kematian;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KematianExport;


class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $datamati = Kematian::where('nama_','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $datamati = Kematian::paginate(10);
        }
        return view('dt_kematian.index', compact('datamati'))->with((request()->input('page',1)-0)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dt_kematian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nik'=>'required|numeric|unique:kematian,nik',
            'nama_'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'tempat_wafaat'=>'required',
            'tgl_wafaat'=>'required',
            'ket'=>'required',
        ]);

       $data = Kematian::create([
        'nik'=>$request->nik,
        'nama_'=>$request->nama_,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'tempat_lahir'=>$request->tempat_lahir,
        'tgl_lahir'=>$request->tgl_lahir,
        'tempat_wafaat'=>$request->tempat_wafaat,
        'tgl_wafaat'=>$request->tgl_wafaat,
        'ket'=>$request->ket,
        ]);
         return redirect('kematian')->with('success','Data Kematian berasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $mati = Kematian::findOrFail($id);
       return view('dt_kematian.edit')->with('mati', $mati);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kematian $kematian)
    {
             $request->validate([
            'nama_' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'tempat_wafaat' => 'required',
            'tgl_wafaat' => 'required',
            'ket' => 'required',
        ]);
        $kematian ->update($request->all());
        return redirect()->route('kematian.index')->with('success','Datara Berasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Kematian::find($id);
        $delete->delete();
        return redirect()->back()->with('delete','Data berasil dihapus!');
    }
    
    public function export()
    {
         return Excel::download(new KematianExport,'datakematian.xlsx');
    }

    public function viewAll() {
        $kematian = Kematian::all();
        return view('layouts.master',compact('kematian'));
    }
}
