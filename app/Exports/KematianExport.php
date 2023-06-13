<?php

namespace App\Exports;

use App\Models\Kematian;
use Maatwebsite\Excel\Concerns\FromCollection;

class KematianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kematian::all();
    }
}
