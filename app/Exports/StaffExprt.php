<?php

namespace App\Exports;

use App\Models\Staf;
use Maatwebsite\Excel\Concerns\FromCollection;

class StaffExprt implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staf::all();
    }
}
