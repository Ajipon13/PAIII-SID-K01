<?php

namespace App\Exports;

use App\Models\Dana;
use Maatwebsite\Excel\Concerns\FromCollection;

class DanaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dana::all();
    }
}
