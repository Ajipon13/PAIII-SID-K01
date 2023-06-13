<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanah;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TanahExport;
class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $tanah = Tanah::where('NamaPemilik','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $tanah = Tanah::paginate(10);
        }
        return view('tanah.index',compact('tanah'))->with((request()->input('page',1)-0)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tanah.create');
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
        $request->validate([
            'NamaPemilik' => 'required|string|max:255',
            'AlamatPemilik' => 'required|string|max:255',
            'JenisTanah' => 'required|string|max:255',
            'UkuranTanah' => 'required|numeric',
            'Status' => 'required|string|max:255',
        ]);
    
        $tanah = new Tanah;
        $tanah->NamaPemilik = $request->NamaPemilik;
        $tanah->AlamatPemilik = $request->AlamatPemilik;
        $tanah->JenisTanah = $request->JenisTanah;
        $tanah->UkuranTanah = $request->UkuranTanah;
        $tanah->Status = $request->Status;
        $tanah->save();
        return redirect('tanah')->with('success', 'Data tanah berhasil disimpan.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return Excel::download(new TanahExport,'tanah.xlsx');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Tanah::FindOrFail($id);
        return view('tanah.edit')->with('edit',$edit);
        
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
            'NamaPemilik' => 'required',
            'AlamatPemilik' => 'required',
            'JenisTanah' => 'required',
            'UkuranTanah' => 'required',
            'Status' => 'required',
        ]);
        
        $data = Tanah::findOrFail($id);
        $data->NamaPemilik = $request->NamaPemilik;
        $data->AlamatPemilik = $request->AlamatPemilik;
        $data->JenisTanah = $request->JenisTanah;
        $data->UkuranTanah = $request->UkuranTanah;
        $data->Status = $request->Status;
        $data->save();
        return redirect('tanah')->with('success', 'Data tanah berhasil diupdate.');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Tanah::FindOrFail($id);
        $delete->delete();
        return redirect('tanah')->with('success', 'Data tanah berhasil dihapus.');

    }
}
