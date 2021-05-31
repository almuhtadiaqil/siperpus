<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Item;
use App\Exports\PemasukansExport;
use App\Exports\PengeluaransExport;
use App\Exports\MutasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = '';
        $request = null;
        return view('pages.report.index', [
            'dokumen' => $dokumen,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('jenis_dokumen')){
            $request->session()->forget('jenis_dokumen');
            $dokumen = $request->jenis_dokumen;
            $tgl_start = $request->tgl_start;
            $tgl_finish = $request->tgl_finish;
            if($dokumen == 'pemasukan'){
                $data_pemasukan = Pemasukan::query()
                ->whereBetween('tgl_msk_start', [$tgl_start, $tgl_finish])
                ->get();

                return view('pages.report.index', [
                    'dokumen' => $dokumen,
                    'data_pemasukan' => $data_pemasukan,
                    'request' => $request,
                    'for_export' => false
                ]);
            }
            elseif($dokumen == 'pengeluaran'){
                $data_pengeluaran = Pengeluaran::query()
                ->whereBetween('get_out_start', [$tgl_start, $tgl_finish])
                ->get();
                return view('pages.report.index', [
                    'dokumen' => $dokumen,
                    'data_pengeluaran'=> $data_pengeluaran,
                    'request' => $request,
                    'for_export' => false
                ]);
            }
            elseif($dokumen == 'mutasi'){

                $results = DB::select( DB::raw("SELECT items.id AS id, items.name as nama, items.jenis_satuan as satuan,
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
            GROUP BY items.id, items.name, items.jenis_satuan;"), array(
                   'tgl_start1' => $tgl_start,
                   'tgl_finish1' => $tgl_finish,
                   'tgl_start2' => $tgl_start,
                   'tgl_finish2' => $tgl_finish,
                   'tgl_finish3' => $tgl_finish,
                   'tgl_finish4' => $tgl_finish
                 ));
                return view('pages.report.index', [
                    'dokumen' => $dokumen,
                    'results' => $results,
                    'request' => $request,
                    'for_export' => false
                ]);            
            }

        }
    }
    public function export_pemasukan($tgl_start, $tgl_finish){
        $tanggal = date('d-m-Y');
        return Excel::download(new PemasukansExport($tgl_start, $tgl_finish), 'Pemasukan '.$tgl_start.' sd '.$tgl_finish.'.xlsx');
    }

    public function export_pengeluaran($tgl_start, $tgl_finish){
        $tanggal = date('d-m-Y');
        return Excel::download(new PengeluaransExport($tgl_start, $tgl_finish), 'Pengeluaran '.$tgl_start.' sd '.$tgl_finish.'.xlsx');
    }
    public function export_mutasi($tgl_start, $tgl_finish){
        $tanggal = date('d-m-Y');
        return Excel::download(new MutasiExport($tgl_start, $tgl_finish), 'Mutasi '.$tgl_start.' sd '.$tgl_finish.' .xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
