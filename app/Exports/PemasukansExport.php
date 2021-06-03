<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use \stdClass;

class PemasukansExport implements FromView, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $start;
    protected $finish;

    function __construct($tgl_start, $tgl_finish)
    {
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

    public function headings(): array
    {
        return ["No.", "No. Pengajuan", "No. Pendaftaran", "Pemasok", "Invoice", "B/L", "Valuta", "Kurs", "Nilai CIF", "Nilai Barang", "Barang", "Tgl Masuk (Start)", "Tgl Masuk (Finish)", "Jumlah Barang", "Jumlah Kemasan", "Jenis Kemasan", "Merk Kemasan", "Bruto", "Neto", "Volume"];
    }



    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                // Apply array of styles to B2:G8 cell range
                $styleArray = [
                    'font' => [
                        'bold' => true
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_MEDIUM,
                            'color' => ['argb' => '#FFFF0000'],
                        ]
                    ]
                ];
                $event->sheet->getDelegate()->getStyle('A2:T2')->applyFromArray($styleArray);
            },
        ];
    }
}
