<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pgmn;
class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pengumuman = Pgmn::all();
       return view('pgmn.index')->with('pengumuman',$pengumuman);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pgmn.create');

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
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required'
        ]);

        $data = new Pgmn;
        $data->tanggal = $request->tanggal;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect('pgmn')->with('success','Data pengumuman telah dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editpgmn = Pgmn::FindOrFail($id);
        return view('pgmn.edit')->with('editpgmn',$editpgmn); 
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
            'tanggal' => 'required|date',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $pengumuman = Pgmn::Find($id);
        $pengumuman->tanggal = $request->tanggal;
        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->save();
        return redirect('pgmn')->with('success','Data pengumuman telah diedit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Pgmn::Find($id);
        $del->delete();
        return redirect('pgmn')->with('success','Data pengumuman telah dihapus!');

    }
}
