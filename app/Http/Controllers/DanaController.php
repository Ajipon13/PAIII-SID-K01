<?php

namespace App\Http\Controllers;
use App\Models\Dana;
use Illuminate\Http\Request;
use App\Exports\DanaExport;
use Maatwebsite\Excel\Facades\Excel;

class DanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dana = Dana::all();
        $dana_pemasukkan = Dana::where('jenis','Pemasukkan')->sum('jumlah');
        $dana_pengeluaran = Dana::where('jenis','Pengeluaran')->sum('jumlah');

        $saldo = $dana_pemasukkan - $dana_pengeluaran;
        return view('dana.index', compact('dana','dana_pemasukkan', 'dana_pengeluaran', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dana.create');
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
            'harga' => 'required',
            'pemasukkan' => 'required',
            'pengeluaran' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);
        
        Dana::create($request->post());

        return redirect()->route('danadesa.index')->with('success','Data keuangan telah disimpan.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dana $dt)
    {
      return Excel::download(new DanaExport($dt), 'dana.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dana $dana)
    {
        //
    return view('dana.edit', compact('dana'));
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
        $request->validate([
            'harga' => 'required',
            'pemasukkan' => 'required',
            'pengeluaran' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
        ]);
        
        $dana->fill($request->post())->save();

        return redirect()->route('danadesa.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dana = Dana::findOrFail($id);
        $dana->delete();
        return redirect('danadesa')->with('success','Data berhasil dihapus');
    }
}

