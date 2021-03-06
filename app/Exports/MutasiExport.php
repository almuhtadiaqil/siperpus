<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use \stdClass;


class MutasiExport implements FromView, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
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

        $results = DB::select(
            DB::raw(
                "SELECT items.id AS id,
                items.name as nama,
                items.jenis_satuan as satuan,
                COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0) AS pemasukan,
                COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0) AS pengeluaran,
                (COALESCE(SUM(DISTINCT p2.jumlah_brg),0)-COALESCE(SUM(DISTINCT p3.jumlah_brg),0)) AS saldo_akhir,
                (COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0)-COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0)) AS selisih
            FROM items
            LEFT JOIN pemasukans 
                ON items.id = pemasukans.barang 
                AND pemasukans.tgl_msk_start >= :tgl_start1 AND pemasukans.tgl_msk_start <= :tgl_finish1
            LEFT JOIN pengeluarans 
                ON items.id = pengeluarans.barang
                AND pengeluarans.get_out_start >= :tgl_start2 AND pengeluarans.get_out_start <= :tgl_finish2
            LEFT JOIN pemasukans p2
                ON items.id = p2.barang 
                AND p2.tgl_msk_start >= '1970-01-01' AND p2.tgl_msk_start <= :tgl_finish3
            LEFT JOIN pengeluarans p3
                ON items.id = p3.barang 
                AND p3.get_out_start >= '1970-01-01' AND p3.get_out_start <= :tgl_finish4
            GROUP BY items.id, items.name, items.jenis_satuan;"
            ),
            array(
                'tgl_start1' => $tgl_start,
                'tgl_finish1' => $tgl_finish,
                'tgl_start2' => $tgl_start,
                'tgl_finish2' => $tgl_finish,
                'tgl_finish3' => $tgl_finish,
                'tgl_finish4' => $tgl_finish
            )
        );
        return view('pages.report.reportMutasi', [
            'results' => $results,
            'request' => $request,
            'for_export' => true
        ]);
    }

    public function array(): array
    {
        $tgl_start = $this->start;
        $tgl_finish = $this->finish;
        $results = DB::select(
            DB::raw(
                "SELECT items.id AS id,
                items.name as nama,
                items.jenis_satuan as satuan,
                COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0) AS pemasukan,
                COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0) AS pengeluaran,
                (COALESCE(SUM(DISTINCT p2.jumlah_brg),0)-COALESCE(SUM(DISTINCT p3.jumlah_brg),0)) AS saldo_akhir,
                (COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0)-COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0)) AS selisih
            FROM items
            LEFT JOIN pemasukans 
                ON items.id = pemasukans.barang 
                AND pemasukans.tgl_msk_start >= :tgl_start1 AND pemasukans.tgl_msk_start <= :tgl_finish1
            LEFT JOIN pengeluarans 
                ON items.id = pengeluarans.barang
                AND pengeluarans.get_out_start >= :tgl_start2 AND pengeluarans.get_out_start <= :tgl_finish2
            LEFT JOIN pemasukans p2
                ON items.id = p2.barang 
                AND p2.tgl_msk_start >= '1970-01-01' AND p2.tgl_msk_start <= :tgl_finish3
            LEFT JOIN pengeluarans p3
                ON items.id = p3.barang 
                AND p3.get_out_start >= '1970-01-01' AND p3.get_out_start <= :tgl_finish4
            GROUP BY items.id, items.name, items.jenis_satuan;"
            ),
            array(
                'tgl_start1' => $tgl_start,
                'tgl_finish1' => $tgl_finish,
                'tgl_start2' => $tgl_start,
                'tgl_finish2' => $tgl_finish,
                'tgl_finish3' => $tgl_finish,
                'tgl_finish4' => $tgl_finish
            )
        );
        return $results;
    }

    public function headings(): array
    {
        return ["Kode Barang", "Nama Barang", "Satuan", "Pemasukan", "Pengeluaran", "Saldo Akhir", "Selisih"];
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
                $event->sheet->getDelegate()->getStyle('A2:H2')->applyFromArray($styleArray);
            },
        ];
    }
}
