<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use PDF;
use App\Models\Surat_Mati;
use Illuminate\Http\Request;

class SMatiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $datam = Surat_Mati::where('nama_meninggal','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $datam = Surat_Mati::paginate(10);
        }
        return view('layanan_surat.surat_mati.index',['datam'=>$datam]);   //
    }

    public function create()
    {
        return view('layanan_surat.surat_mati.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required',
            'nama_meninggal' => 'required',
            'nik_meninggal' => 'required',
            'jk_meninggal' => 'required',
            't4_lahir_meninggal' => 'required',
            'tgl_lahir_meninggal' => 'required',
            'wargaN_meninggal' => 'required',
            'agama_meniggal' => 'required',
            's_pernikaan_meninggal' => 'required',
            'pekerjaanM' => 'required',
            'alamatM' => 'required',
            'tgl_meningaal' => 'required',
            'waktuM' => 'required',
            't4_meinggal' => 'required',
            'sebab' => 'required',
            'nama_pembuat' => 'required',
            'nik_pembuat' => 'required',
            't4_lahir_pembuat' => 'required',
            'tgl_lahir_pembuat' => 'required',
            'pekerjaan_pemnuat' => 'required',
            'alamat_pembuat' => 'required',
        ]);

        $nilai = 0;
        Surat_Mati::create([
                'nomor' => $request->nomor,
                'nama_meninggal' => $request->nama_meninggal,
                'nik_meninggal' => $request->nik_meninggal,
                'jk_meninggal' => $request->jk_meninggal,
                't4_lahir_meninggal' => $request->t4_lahir_meninggal,
                'tgl_lahir_meninggal' => $request->tgl_lahir_meninggal,
                'wargaN_meninggal' => $request->wargaN_meninggal,
                'agama_meniggal' => $request->agama_meniggal,
                's_pernikaan_meninggal' => $request->s_pernikaan_meninggal,
                'pekerjaanM' => $request->pekerjaanM,
                'alamatM' => $request->alamatM,
                'tgl_meningaal' => $request->tgl_meningaal,
                'waktuM' => $request->waktuM,
                't4_meinggal' => $request->t4_meinggal,
                'sebab' => $request->sebab,
                'nama_pembuat' => $request->nama_pembuat,
                'nik_pembuat' => $request->nik_pembuat,
                't4_lahir_pembuat' => $request->t4_lahir_pembuat,
                'tgl_lahir_pembuat' => $request->tgl_lahir_pembuat,
                'pekerjaan_pemnuat' => $request->pekerjaan_pemnuat,
                'alamat_pembuat' => $request->alamat_pembuat,
                'tb_penduduk_id'=>$nilai,
        ]);
        return redirect('sm')->with('success', 'Berhasil Membuat Surat');
    }
    public function approve($id)
    {
        $surat = Surat_Mati::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = Surat_Mati::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

    public function download($id)
    {
        $surat = Surat_Mati::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_mati.show', array('surat' => $surat));
        return $pdf->download('suratmati.pdf');
        
    }
}
