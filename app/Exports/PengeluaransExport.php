<?php

namespace App\Exports;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengeluaransExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengeluaran::all();
    }
}
