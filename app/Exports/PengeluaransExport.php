<?php

namespace App\Exports;
use App\Models\Pengeluaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use \stdClass;

class PengeluaransExport implements FromView, WithHeadings, ShouldAutoSize
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

        $data_pengeluaran = Pengeluaran::query()
            ->whereBetween('get_out_start', [$tgl_start, $tgl_finish])
            ->get();

        return view('pages.report.reportPengeluaran', [
            'data_pengeluaran' => $data_pengeluaran,
            'request' => $request,
            'for_export' => true
        ]);
    }    


    public function headings() :array
    {
        return ["No.", "No. Aju 2.3", "No. Pendaftaran 2.3", "No. Aju 2.5", "No. Pendaftaran 2.5", "Penerima", "Invoice", "Packing List", "Valuta", "Kurs", "Nilai CIF", "Nilai Barang", "Barang", "Get Out (Start)", "Get Out (Finish)", "Jumlah Barang", "Jumlah Kemasan", "Jenis Kemasan", "Merk Kemasan", "Bruto", "Neto", "Volume"];
    }
}
