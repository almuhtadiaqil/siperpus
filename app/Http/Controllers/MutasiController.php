<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = DB::select( DB::raw("SELECT items.id AS id, items.name as nama, items.jenis_satuan as satuan,
                COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0) AS pemasukan,
                COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0) AS pengeluaran,
                (COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0)-COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0)) AS saldo_akhir,
                (COALESCE(SUM(DISTINCT pemasukans.jumlah_brg),0)-COALESCE(SUM(DISTINCT pengeluarans.jumlah_brg),0)) AS selisih
            FROM items
            LEFT JOIN pemasukans 
                ON items.id = pemasukans.barang 
            LEFT JOIN pengeluarans 
                ON items.id = pengeluarans.barang
            GROUP BY items.id, items.name, items.jenis_satuan;"));     
        return view('pages.mutasi.index', [
            'results' => $results
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
        //
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
