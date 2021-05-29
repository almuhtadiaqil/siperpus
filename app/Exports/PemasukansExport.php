<?php

namespace App\Exports;
use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemasukansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::all();
    }
}
