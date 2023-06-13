<?php

namespace App\Exports;

use App\Models\Usaha;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsahaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usaha::all();
    }
}
