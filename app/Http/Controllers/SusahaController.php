<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\models\Surat_Usaha;

class SusahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $usaha = Surat_Usaha::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $usaha = Surat_Usaha::paginate(10);
        }
        return view('layanan_surat.surat_usaha.index',compact('usaha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan_surat.surat_usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no' => 'required',
            'nama' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'jenis_usaha' => 'required',
            'sejak' => 'required',
        ]);

//  if ($validator->fails()) {
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

        $data = 0;
        Surat_Usaha::create([
            'no' => $request->no,
            'nama' => $request->nama,
            't4_lahir' => $request->t4_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'jenis_usaha' => $request->jenis_usaha,
            'sejak' => $request->sejak,
            'tb_penduduk_id' => $data,
        ]);

        return redirect('su')->with(['success' => 'Berhasil Membuat Surat']);
    }

    public function approve($id)
    {
        $surat = Surat_Usaha::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = Surat_Usaha::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

    public function download($id)
    {
        $surat = Surat_Usaha::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_usaha.show', array('surat' => $surat));
        return $pdf->download('data.pdf');
        
    }
}
