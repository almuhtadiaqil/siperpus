<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class ReportController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.report.index');
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
                return view('pages.report.index', [
                    'dokumen' => $dokumen
                ]);
             }
            elseif($dokumen == 'mutasi'){
                return view('pages.report.index', [
                    'dokumen' => $dokumen
                ]);            
            }
            else{
    
            }
            }
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
