<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\Models\Surat_baik;
use App\Models\Penduduk;
use Illuminate\Support\Facades\DB;  

class SuratBaikController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $baik = Surat_baik::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $baik = Surat_baik::paginate(10);
        }
        return view('layanan_surat.surat_baik.index',compact('baik'));

    }


    public function create()
    {
        $pemilik = Penduduk::all();
        return view('layanan_surat.surat_baik.create',compact('pemilik'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'bangsa' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'tb_penduduk_id'=>'tb_penduduk_id',
        ]);
        $data = 0;
        Surat_baik::create([
            'no' => $request->no,
            'nama' => $request->nama,
            'jk' => $request->jk,
            't4_lahir' => $request->t4_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'bangsa' => $request->bangsa,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'tb_penduduk_id' => $data,
        ]);

        return redirect('skbb')->with('success','Berhasil Membuat Surat');
    }


    public function approve($id)
    {
        $surat = Surat_baik::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = Surat_baik::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

    public function download($id)
    {
        $surat = Surat_baik::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_baik.show', array('surat' => $surat));
        return $pdf->download('data.pdf');
        
    }
}
