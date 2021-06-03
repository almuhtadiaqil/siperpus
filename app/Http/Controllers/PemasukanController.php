<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Item;
use App\Http\Requests\PemasukanRequest;
use Illuminate\Support\Str;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukans = Pemasukan::all();
        $items = Item::all();


        return view('pages.pemasukan.index', [
            'pemasukans' => $pemasukans,
            'items' => $items
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
        $items = Item::all();
        return view('pages.pemasukan.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemasukan::create([
            'no_pengajuan' => $request->no_pengajuan,
            'no_pendaftaran' => $request->no_pendaftaran,
            'pemasok' => $request->pemasok,
            'invoice' => $request->invoice,
            'bl' => $request->bl,
            'valuta' => $request->valuta,
            'kurs' => $request->kurs,
            'nilai_cif' => $request->nilai_cif,
            'nilai_barang' => $request->nilai_barang,
            'barang' => $request->barang,
            'tgl_msk_start' => $request->tgl_msk_start,
            'tgl_msk_finish' => $request->tgl_msk_finish,
            'jumlah_brg' => $request->jumlah_brg,
            'jumlah_kemasan' => $request->jumlah_kemasan,
            'jenis_kemasan' => $request->jenis_kemasan,
            'merk_kemasan' => $request->merk_kemasan,
            'bruto' => $request->bruto,
            'netto' => $request->netto,
            'volume' => $request->volume,
        ]);
        return redirect()->route('pemasukan.index')->with('pesan_create', 'Data berhasil ditambahkan');
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
        Pemasukan::where('id', $id)->update([
            'no_pengajuan' => $request->no_pengajuan,
            'no_pendaftaran' => $request->no_pendaftaran,
            'pemasok' => $request->pemasok,
            'invoice' => $request->invoice,
            'bl' => $request->bl,
            'valuta' => $request->valuta,
            'kurs' => $request->kurs,
            'nilai_cif' => $request->nilai_cif,
            'nilai_barang' => $request->nilai_barang,
            'barang' => $request->barang,
            'tgl_msk_start' => $request->tgl_msk_start,
            'tgl_msk_finish' => $request->tgl_msk_finish,
            'jumlah_brg' => $request->jumlah_brg,
            'jumlah_kemasan' => $request->jumlah_kemasan,
            'jenis_kemasan' => $request->jenis_kemasan,
            'merk_kemasan' => $request->merk_kemasan,
            'bruto' => $request->bruto,
            'netto' => $request->netto,
            'volume' => $request->volume
        ]);
        return redirect()->route('pemasukan.index')->with('pesan_edit', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukans = Pemasukan::findOrFail($id);
        $pemasukans->delete();

        return redirect()->route('pemasukan.index')->with('pesan_delete', 'Data berhasil dihapus');
    }
}
