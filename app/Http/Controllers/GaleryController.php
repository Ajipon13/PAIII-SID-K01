<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galer = Galery::orderBy('id', 'desc')->paginate(10);
        return view('galeri.index', ['galer' => $galer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri.create');
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
            'desk' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
          ]);
      
          $imageName = time() . '.' . $request->img->extension();
          $request->img->storeAs('public/img', $imageName);
      
          $galeriData = ['desk' => $request->desk, 'img' => $imageName];
      
          Galery::create($galeriData);
          return redirect('/galeri')->with(['success' => 'Gambaar berasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = Galery::FindOrFail($id);
        return view('galeri.edit', ['galeri' => $galeri]);
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
        $galeri = Galery::findOrFail($id);

        $request->validate([
            'desk' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);
    
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/img', $imageName);
            $galeri->img = $imageName;
        }
        $galeri->desk = $request->desk;
        $galeri->save();

       return redirect('/galeri')->with(['success' => 'Gambaar berasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Galery::find($id);
        $delete->delete();
        return redirect('galeri')->with('success','Data berasil dihapus!');
    }

    public function img(){
        $img = Galery::all();
        return view('website.img.index')->with('img', $img);
    }
}
