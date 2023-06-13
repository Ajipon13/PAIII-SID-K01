<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use PDF;

use Illuminate\Http\Request;
use App\Exports\LayananSuratExport;
use App\Models\LayananSurat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $surat = LayananSurat::all();
            // return view('layanan_surat.surat.index',compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $re)
    {
        $r_surat = new LayananSurat;
        $r_surat->context = $re->input('context');
        $r_surat->no_ktp = $re->input('no_ktp');
        $r_surat->nama = $re->input('nama');
        $r_surat->jk = $re->input('jk');
        $r_surat->pendidikan = $re->input('pendidikan');
        $r_surat->perkawinan = $re->input('perkawinan');
        $r_surat->pekerjaan = $re->input('pekerjaan');
        $r_surat->rtrw = $re->input('rtrw');
        $r_surat->kategori = $re->input('kategori');
        $r_surat->tanggal = $re->input('tanggal');
        $r_surat->save();
        
        return redirect('lanyanansurat')->with('success','Surat telah berasil dibuat!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\LayananSurat $surat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = LayananSurat::find($id);
        return view('surat.show', ['surat' => $surat]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = LayananSurat::findOrFail($id);
        return view('surat.edit', compact('edit'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //
    }
    public function download($id)
    {
        $surat = LayananSurat::findOrFail($id);
        $pdf = PDF::loadView('surat.show', array('surat' => $surat));
        return $pdf->download('data.pdf');
        
    }


    public function pdf(LayananSurat $item, $id){

    }
    
    public function approve($id)
    {
        $surat = LayananSurat::findOrFail($id);
        $surat->approval(true);
        return redirect()->back();
    }

    public function reject($id)
    {
        $surat = LayananSurat::findOrFail($id);
        $surat->approval(false);
        return redirect()->back();
    }

    }
