<?php

namespace App\Exports;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengeluaransExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengeluaran::all();
    }


    public function headings() :array
    {
        return ["No.", "No. Aju 2.3", "No. Pendaftaran 2.3", "No. Aju 2.5", "No. Pendaftaran 2.5", "Penerima", "Invoice", "Packing List", "Valuta", "Kurs", "Nilai CIF", "Nilai Barang", "Barang", "Get Out (Start)", "Get Out (Finish)", "Jumlah Barang", "Jumlah Kemasan", "Jenis Kemasan", "Merk Kemasan", "Bruto", "Neto", "Volume"];
    }
}
