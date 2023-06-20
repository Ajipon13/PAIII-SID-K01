<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\Models\SKK;
class SkkController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $skk = SKK::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $skk = SKK::paginate(10);
        }
        return view('layanan_surat.skk.index',compact('skk'));
    }


    public function create()
    {
        return view('layanan_surat.skk.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            's_pernikaan' => 'required',
            'pekerjaan' => 'required',
            'warga_negara' => 'required',
            'alamat' => 'required',
            'nama_pasang' => 'required',
            'wargapasangan' => 'required',
        ]);
        $value = 0;
        SKK::create([
            'nama' => $request->input('nama'),
            'jk' => $request->input('jk'),
            't4_lahir' => $request->input('t4_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'agama' => $request->input('agama'),
            's_pernikaan' => $request->input('s_pernikaan'),
            'pekerjaan' => $request->input('pekerjaan'),
            'warga_negara' => $request->input('warga_negara'),
            'alamat' => $request->input('alamat'),
            'nama_pasang' => $request->input('nama_pasang'),
            'wargapasangan' => $request->input('wargapasangan'),
            'tb_penduduk_id'=>$value,
        ]);
        return redirect('skk')->withSuccess('Berhasil Membuat Surat');
    }

    public function download($id)
    {
        $surat = SKK::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.skk.show', array('surat' => $surat));
        return $pdf->download('skk.pdf');
        
    }



    public function approve($id)
    {
        $surat = SKK::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = SKK::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

}
