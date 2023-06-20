<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\Models\KTP;
class KTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ($request->has('cari')) {
                $ktp = KTP::where('nama','LIKE','%'.$request->cari.'%')->paginate(10);
            }elseif ('cari') {
                $ktp = KTP::paginate(10);
            }
       return view('layanan_surat.surat_ktp.index', compact('ktp'))->with((request()->input('page',1)-0)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan_surat.surat_ktp.create');
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
            'nik' => 'required|between:16,16',
            'nama' => 'required',
            'jk' => 'required',
            't4_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'nama_pasangan' => 'required',
            'pekerjaan' => 'required',
            'tb_penduduk_id' => 'tb_penduduk_id',
        ]);

        $validator->setMessages([
            'nik.size' => 'NIK harus terdiri dari 16 karakter.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        $data = 0;
        KTP::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            't4_lahir' => $request->t4_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'kecamatan' => $request->kecamatan,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'nama_pasangan' => $request->nama_pasangan,
            'pekerjaan' => $request->pekerjaan,
            'tb_penduduk_id'=>$data,
        ]);

        return redirect('ktp')->with('success','Berhasil Membuat Surat');
    }


    public function download($id)
    {
        $surat = KTP::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_baik.show', array('surat' => $surat));
        return $pdf->download('data.pdf');
        
    }

    public function approve($id)
    {
        $surat = KTP::Find($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = KTP::Find($id);
        $surat->approval(false);
        return redirect()->back();
    }
}
