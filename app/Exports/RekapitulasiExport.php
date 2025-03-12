<?php

namespace App\Exports;

use App\Models\Rekapitulasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapitulasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rekapitulasi::all();
    }
}
