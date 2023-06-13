<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SKKM;
class SKKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skkm = SKKM::all();
        return view('layanan_surat.surat_kkm.index',compact('skkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function download($id)
    {
        $surat = SKKM::findOrFail($id);
        $pdf = PDF::loadView('layanan_surat.surat_baik.show', array('surat' => $surat));
        return $pdf->download('data.pdf');
        
    }

    public function approve($id)
    {
        $surat = SKKM::Find($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = SKKM::Find($id);
        $surat->approval(false);
        return redirect()->back();
    }
}
