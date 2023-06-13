<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\Models\Surat_Bkawin;
class SuratBKawinController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data = Surat_Bkawin::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $data = Surat_Bkawin::paginate(10);
        }
        return view('layanan_surat.surat_bkwin.index',['data'=>$data]);   //
    }


    public function create()
    {
        return view('layanan_surat.surat_bkwin.create');
    }


    public function store(Request $request)
    {
         $request->validate([
            'no' => 'required',
            'nama' => 'required',
            's_pernikaan' => 'required',
            'tgl_lahir' => 'required',
            't4_lahir' => 'required',
            'pekerjaan' => 'required',
            'warga_negara' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'nik' => 'required',
            'agama' => 'required',
            'tb_penduduk_id'=>'tb_penduduk_id',
        ]);
        $value = 0;
        Surat_Bkawin::create([
            'no' => $request->no,
            'nama' => $request-> nama,
            's_pernikaan' => $request-> s_pernikaan,
            'tgl_lahir' => $request-> tgl_lahir,
            't4_lahir' => $request-> t4_lahir,
            'pekerjaan' => $request-> pekerjaan,
            'warga_negara' => $request-> warga_negara,
            'alamat' => $request-> alamat,
            'jk' => $request-> jk,
            'nik' => $request-> nik,
            'agama' => $request-> agama,
            'tb_penduduk_id' => $value,
        ]);

        return redirect('sbk')->with('success', 'Surat Bkawin berhasil disimpan.');
    }

    
    public function approve($id)
    {
        $surat = Surat_Bkawin::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = Surat_Bkawin::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

    public function download($id)
    {
        $surat = Surat_Bkawin::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_bkwin.show', array('surat' => $surat));
        return $pdf->download('belumkawin.pdf');
        
    }
}
