<?php

namespace App\Exports;

use App\Models\PendudukSementara;
use Maatwebsite\Excel\Concerns\FromCollection;

class SementraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PendudukSementara::all();
    }
}
