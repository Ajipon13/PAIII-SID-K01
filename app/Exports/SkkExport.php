<?php

namespace App\Exports;

use App\Models\SKK;
use Maatwebsite\Excel\Concerns\FromCollection;

class SkkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SKK::all();
    }
}
