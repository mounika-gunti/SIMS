<?php

namespace App\Exports;

use App\Models\WorkStatus;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WorkStatus::all();
    }
}
