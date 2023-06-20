<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\Models\Domisili;
class DomisiliController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $domisili = Domisili::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $domisili = Domisili::paginate(10);
        }
        return view('layanan_surat.surat_domisili.index',['domisili'=>$domisili]);
    }


    public function create()
    {
        return view('layanan_surat.surat_domisili.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|between:16,16',
            'jk' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'pekerjaan' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'agama' => 'required',
            'tb_penduduk_id' => 'tb_penduduk_id',
        ]);
        $data = 0;
        $domisili = Domisili::create([
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'nik'=>$request->nik,
            't4_lahir'=>$request->t4_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'kecamatan'=>$request->kecamatan,
            'agama'=>$request->agama,
            'kabupaten'=>$request->kabupaten,
            'pekerjaan'=>$request->pekerjaan,
            'kewarganegaraan'=>$request->kewarganegaraan,
            'desa'=>$request->desa,
            'tb_penduduk_id'=>$data,
        ]);
        
        return redirect('domisili')->with('success','Berhasil Membuat Surat');
    }
    
    // public function show($id){
    //     $surat = Domisili::Find($id);
    //     return view('layanan_surat.surat_domisili.show', compact('surat'));
    // }
   
    public function approve($id)
    {
        $surat = Domisili::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = Domisili::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

    public function download($id)
    {
        $surat = Domisili::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_domisili.show', array('surat' => $surat));
        return $pdf->download('data.pdf');
        
    }
}
