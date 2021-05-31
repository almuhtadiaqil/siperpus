<?php

namespace App\Exports;
use App\Models\Pemasukan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use \stdClass;

class PemasukansExport implements FromView, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    protected $start;
    protected $finish;

    function __construct($tgl_start, $tgl_finish) {
        $this->start = $tgl_start;
        $this->finish = $tgl_finish;
    }

    public function view(): View
    {
        $tgl_start = $this->start;
        $tgl_finish = $this->finish;

        //buat objek request manual
        $request = new stdClass;
        $request->tgl_start = $tgl_start;
        $request->tgl_finish = $tgl_finish;

        $data_pemasukan = Pemasukan::query()
            ->whereBetween('tgl_msk_start', [$tgl_start, $tgl_finish])
            ->get();

        return view('pages.report.reportPemasukan', [
            'data_pemasukan' => $data_pemasukan,
            'request' => $request,
            'for_export' => true
        ]);
    }    

    public function headings() :array
    {
        return ["No.", "No. Pengajuan", "No. Pendaftaran","Pemasok", "Invoice", "B/L", "Valuta", "Kurs", "Nilai CIF", "Nilai Barang", "Barang", "Tgl Masuk (Start)", "Tgl Masuk (Finish)", "Jumlah Barang", "Jumlah Kemasan", "Jenis Kemasan", "Merk Kemasan", "Bruto", "Neto", "Volume"];
    }
}
