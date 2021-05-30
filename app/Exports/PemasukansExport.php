<?php

namespace App\Exports;
use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PemasukansExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::all();
    }

    public function headings() :array
    {
        return ["No.", "No. Pengajuan", "No. Pendaftaran","Pemasok", "Invoice", "B/L", "Valuta", "Kurs", "Nilai CIF", "Nilai Barang", "Barang", "Tgl Masuk (Start)", "Tgl Masuk (Finish)", "Jumlah Barang", "Jumlah Kemasan", "Jenis Kemasan", "Merk Kemasan", "Bruto", "Neto", "Volume"];
    }
}
