<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Dompdf\Dompdf;
use App\Exports\LayananSuratExport;
use Maatwebsite\Excel\Facades\Excel;
// use Barryvdh\DomPDF\Facade;
use PDF;
use App\Models\LayananSurat;

class LanyananSuratController extends Controller
{
    //
    public function index(Request $request){
        if ($request->input()){
            
            $criteria = $request->input('kategori');
            $surat = LayananSurat::where('kategori', $criteria)->get();
        }elseif ($request-> empty ) {
            return ( 'wenam');
        }
        else {
            $surat = LayananSurat::all();
            
        }
        
        return view('surat.index',compact('surat'));
    }
    
    public function show(){
        // $letters = LayananSurat::find($id); ['letters' => $letters]
        return view('layanan_surat.index');
    }
    
 

    public function skj(){
        return view('layanan_surat.skj');
    }

    public function create(){

        return view('layanan_surat.arsip.create');
      
    }

    public function store( Request $request){

        $suratRequest = new LayananSurat;
        $suratRequest->context = $request->input('context');
        $suratRequest->no_ktp = $request->input('no_ktp');
        $suratRequest->nama = $request->input('nama');
        $suratRequest->jk = $request->input('jk');
        $suratRequest->pendidikan = $request->input('pendidikan');
        $suratRequest->perkawinan = $request->input('perkawinan');
        $suratRequest->pekerjaan = $request->input('pekerjaan');
        $suratRequest->kategori = $request->input('kategori');
        $suratRequest->rtrw = $request->input('rtrw');
        $suratRequest->tanggal = $request->input('tanggal');
        $suratRequest->save();

        return redirect('kbaik')->with('success','Surat telah berasil dibuat!');
 
    }

    public function download(){
        $pdf = PDF::loadView('layanan_surat.arsip.download'); 
        $pdf->setPaper('A5','portrait');
        $pdf->render();
        $pdf->save(public_path('example.pdf'));
        return $pdf->download('example.pdf');

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
