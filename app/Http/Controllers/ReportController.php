<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Item;
use App\Exports\PemasukansExport;
use App\Exports\PengeluaransExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ReportController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumen = '';
        return view('pages.report.index', compact('dokumen'));
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
                    'data_pemasukan' => $data_pemasukan
                ]);
            }
            elseif($dokumen == 'pengeluaran'){
                $data_pengeluaran = Pengeluaran::query()
                ->whereBetween('get_out_start', [$tgl_start, $tgl_finish])
                ->get();
                return view('pages.report.index', [
                    'dokumen' => $dokumen,
                    'data_pengeluaran'=> $data_pengeluaran

                ]);
            }
            elseif($dokumen == 'mutasi'){

                $results = DB::select( DB::raw("SELECT items.id AS id, items.name as nama, items.jenis_satuan as satuan,
                SUM(DISTINCT pemasukans.jumlah_brg) AS pemasukan,
                SUM(DISTINCT pengeluarans.jumlah_brg) AS pengeluaran
            FROM items
            LEFT JOIN pemasukans 
                ON items.id = pemasukans.barang 
                AND pemasukans.tgl_msk_start >= :tgl_start1 AND pemasukans.tgl_msk_start  <= :tgl_finish1
            LEFT JOIN pengeluarans 
                ON items.id = pengeluarans.barang
                AND pengeluarans.get_out_start >= :tgl_start2 AND pengeluarans.get_out_start  <= :tgl_finish2
            GROUP BY items.id, items.name, items.jenis_satuan;"), array(
                   'tgl_start1' => $tgl_start,
                   'tgl_finish1' => $tgl_finish,
                   'tgl_start2' => $tgl_start,
                   'tgl_finish2' => $tgl_finish,
                 ));

                return view('pages.report.index', [
                    'dokumen' => $dokumen,
                    'results' => $results
                ]);            
            }

        }
    }
    public function export_pemasukan(){
        $tanggal = date('d-m-Y');
        return Excel::download(new PemasukansExport, 'Pemasukan_'.$tanggal.'.xlsx');
    }
    public function export_pengeluaran(){
        return Excel::download(new PengeluaransExport, 'pengeluaran.xlsx');
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
