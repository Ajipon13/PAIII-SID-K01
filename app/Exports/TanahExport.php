<?php

namespace App\Exports;

use App\Models\Tanah;
use Maatwebsite\Excel\Concerns\FromCollection;

class TanahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tanah::all();
    }
}
