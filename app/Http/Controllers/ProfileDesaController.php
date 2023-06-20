<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileDesa;

class ProfileDesaController extends Controller
{


    public function index()
    {
        $profdata = ProfileDesa::all();
        return view('profil.index', ['profdata' => $profdata]);
    }


    public function create()
    {
        return view('profil.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'profile_desa' => 'required|max:2000',
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);
          $imageName = time() . '.' . $request->profile_img->extension();
          $request->profile_img->storeAs('public/profile_img', $imageName);
      
          $galeriData = ['profile_desa' => $request->profile_desa, 'profile_img' => $imageName];

         ProfileDesa::create($galeriData);
        return redirect('profil')->with('success','Profile desa telah dibuat');
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
       $edit = ProfileDesa::FindOrFail($id);
       return view('profil/edit')->with('edit', $edit);
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
        $galeri = ProfileDesa::findOrFail($id);

        $request->validate([
            'profile_desa' => 'required',
            'profile_img'=>'required'
            
        ]);

        if ($request->hasFile('profile_img')) {
            $imageName = time() . '.' . $request->profile_img->extension();
            $request->profile_img->storeAs('public/profile_img', $imageName);
            $galeri->profile_img = $imageName;
        }
        $galeri->profile_desa = $request->profile_desa;
        $galeri->save();

        return redirect('profil')->with('success','Profile desa telah diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = ProfileDesa::find($id);
        $profil->delete();
        return redirect('profil')->with('success','Profile desa telah dihapus');

    }
}
