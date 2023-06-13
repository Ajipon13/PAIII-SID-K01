<?php

namespace App\Exports;

use App\Models\LayananSurat;
use Maatwebsite\Excel\Concerns\FromCollection;

class LayananSuratExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LayananSurat::all();
    }
}
