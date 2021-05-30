<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
class MutasiExport implements FromQuery, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $tgl_start = "2021-05-01";
        $tgl_finish = "2021-05-31";
                $results=DB::table( DB::raw("SELECT items.id AS id, items.name as nama, items.jenis_satuan as satuan,
                SUM(DISTINCT pemasukans.jumlah_brg) AS pemasukan,
                SUM(DISTINCT pengeluarans.jumlah_brg) AS pengeluaran
            FROM items
            INNER JOIN pemasukans 
                ON items.id = pemasukans.barang 
                AND pemasukans.tgl_msk_start >= :tgl_start1 AND pemasukans.tgl_msk_start  <= :tgl_finish1
            INNER JOIN pengeluarans 
                ON items.id = pengeluarans.barang
                AND pengeluarans.get_out_start >= :tgl_start2 AND pengeluarans.get_out_start  <= :tgl_finish2
            GROUP BY items.id, items.name, items.jenis_satuan;"), array(
                   'tgl_start1' => $tgl_start,
                   'tgl_finish1' => $tgl_finish,
                   'tgl_start2' => $tgl_start,
                   'tgl_finish2' => $tgl_finish,
                 )); ;
                 return $results;
    }

    public function headings() :array
    {
        return ["No.", "Kode Barang", "Nama Barang","Satuan", "Pemasukan", "Pengeluaran", "Saldo Akhir", "Selisih"];
    }
}
