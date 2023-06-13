<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usaha;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsahaExport;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $usaha = Usaha::where('Lokasi','LIKE','%'.$request->cari.'%')->paginate(10);
        }elseif ('cari') {
            $usaha = Usaha::paginate(10);
        }
        return view('usaha.index',compact('usaha'))->with((request()->input('page',1)-0)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usaha.create');
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
            'jenis_usaha' => 'required|string',
            'jumlah' => 'required|numeric',
            'Lokasi' => 'required|string',
        ]);

        $usaha = new Usaha;
        $usaha->jenis_usaha = $request->jenis_usaha;
        $usaha->jumlah = $request->jumlah;
        $usaha->Lokasi = $request->Lokasi;
        $usaha->save();
        return redirect('t_usaha')->with('success','Data tempat usaha telah dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Excel::download(new UsahaExport,'usaha.xlsx');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Usaha::FindOrFail($id);
        return view('usaha.edit')->with('edit',$edit);

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
            'jenis_usaha' => 'required|string',
            'jumlah' => 'required|numeric',
            'Lokasi' => 'required|string',
        ]);
        
        $data = Usaha::findOrFail($id);
        $data->jenis_usaha = $request->jenis_usaha;
        $data->jumlah = $request->jumlah;
        $data->Lokasi = $request->Lokasi;
        $data->save();
        return redirect('t_usaha')->with('success','Data tempat usaha telah diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Usaha::FindOrFail($id);
        $delete->delete();
        return redirect('t_usaha')->with('success','Data tempat usaha telah dihapus');


    }
}
