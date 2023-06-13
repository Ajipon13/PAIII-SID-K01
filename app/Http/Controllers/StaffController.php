<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffExprt;

class StaffController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $staff = Staf::where('nama_staf','LIKE','%'.$request->cari.'%')->paginate(5);
        }elseif ('cari') {
            $staff = Staf::paginate(5);
        }
       return view('staff.index', compact('staff'))->with((request()->input('page',1)-0)*5);
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
           $request->validate([
            'nik_staf' => 'required',
            'nama_staf' => 'required',
            'jenisk_staf' => 'required',
            'agama_staf' => 'required',
            'pekerjaan_staf' => 'required',
            'pendidikan_staf' => 'required',
        ]);
        // Simpan data ke dalam database
        Staf::create([
            'nik_staf' => $request->nik_staf,
            'nama_staf' => $request->nama_staf,
            'jenisk_staf' => $request->jenisk_staf,
            'agama_staf' => $request->agama_staf,
            'pekerjaan_staf' => $request->pekerjaan_staf,
            'pendidikan_staf' => $request->pendidikan_staf
        ]);
        
        return redirect('staff')->withSuccess('Data staf berhasil ditambahkan');
    }

    
    
    public function export()
    {
         return Excel::download(new StaffExprt,'staff.xlsx');
    }


    public function edit($id)
    {
        $staffedit = Staf::find($id);
        return view('staff.edit',compact('staffedit'));
    }


    public function update(Request $request, $id    )
    {
        // Validasi input form
        $request ->validate([
            'nik_staf' => 'required',
            'nama_staf' => 'required',
            'jenisk_staf' => 'required',
            'agama_staf' => 'required',
            'pekerjaan_staf' => 'required',
            'pendidikan_staf' => 'required',
        ]);

        // Temukan data staf berdasarkan ID
        $staf = Staf::findOrFail($id);

        // Update data staf
        $staf->update([
            'nik_staf' => $request->nik_staf,
            'nama_staf' => $request->nama_staf,
            'jenisk_staf' => $request->jenisk_staf,
            'agama_staf' => $request->agama_staf,
            'pekerjaan_staf' => $request->pekerjaan_staf,
            'pendidikan_staf' => $request->pendidikan_staf,
        ]);
        return redirect('staff')->withSuccess('Data staf berhasil ditambahkan');


    }

 
    public function destroy($id)
    {
        $delete = Staf::FindOrFail($id);
        $delete->delete($delete);
        return redirect('staff')->withSuccess('Data staf berhasil dihapus');
    }
}
