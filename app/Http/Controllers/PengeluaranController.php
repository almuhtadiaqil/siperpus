<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Item;
use App\Http\Requests\PengeluaranRequest;
use Illuminate\Support\Str;
class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        $items = Item::all();

        return view('pages.pengeluaran.index',[
             'pengeluarans' => $pengeluarans
        ]);
        //return view('pages.pemasukan.index');
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
        Pengeluaran::create([
            'no_aju_bc23' => $request->no_aju_bc23,
            'no_pendaftaran_23' => $request->no_pendaftaran_23,
            'no_aju_bc25' => $request->no_aju_bc25,
            'no_pendaftaran_25' => $request->no_pendaftaran_25,
            'penerima' => $request->penerima,
            'invoice' => $request->invoice,
            'packing_list' => $request->packing_list,
            'valuta' => $request->valuta,
            'kurs' => $request->kurs,
            'nilai_cif' => $request->nilai_cif,
            'nilai_barang' => $request->nilai_barang,
            'barang' => $request->barang,
            'get_out_start' => $request->get_out_start,
            'get_out_finish' => $request->get_out_finish,
            'jumlah_brg' => $request->jumlah_brg,
            'jumlah_kemasan' => $request->jumlah_kemasan,
            'jenis_kemasan' => $request->jenis_kemasan,
            'merk_kemasan' => $request->merk_kemasan,
            'bruto' => $request->bruto,
            'netto' => $request->netto,
            'volume' => $request->volume
        ]);
        return redirect()->route('pengeluaran.index');
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
        Pengeluaran::where('id', $id)->update([
            'no_aju_bc23' => $request->no_aju_bc23,
            'no_pendaftaran_23' => $request->no_pendaftaran_23,
            'no_aju_bc25' => $request->no_aju_bc25,
            'no_pendaftaran_25' => $request->no_pendaftaran_25,
            'penerima' => $request->penerima,
            'invoice' => $request->invoice,
            'packing_list' => $request->packing_list,
            'valuta' => $request->valuta,
            'kurs' => $request->kurs,
            'nilai_cif' => $request->nilai_cif,
            'nilai_barang' => $request->nilai_barang,
            'barang' => $request->barang,
            'get_out_start' => $request->get_out_start,
            'get_out_finish' => $request->get_out_finish,
            'jumlah_brg' => $request->jumlah_brg,
            'jumlah_kemasan' => $request->jumlah_kemasan,
            'jenis_kemasan' => $request->jenis_kemasan,
            'merk_kemasan' => $request->merk_kemasan,
            'bruto' => $request->bruto,
            'netto' => $request->netto,
            'volume' => $request->volume
        ]);
        return redirect()->route('pengeluaran.index');
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
