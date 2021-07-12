<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\Book;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $books = Book::all();
        return view('pages.peminjaman.index', [
            'peminjaman' => $peminjaman,
            'books' => $books
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
        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'nama_peminjam' => $request->nama_peminjam,
            'umur_peminjam' => $request->umur_peminjam,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'nama_instansi' => $request->nama_instansi,
            'alamat_rumah' => $request->alamat_rumah,
            'alamat_instansi' => $request->alamat_instansi,
            'status' => 'Dipinjam',
            'waktu_peminjaman' => $request->waktu_peminjaman,
            'waktu_pengembalian' => $request->waktu_pengembalian
        ]);
        Book::where('id_buku', $request->id_buku)->update([
            'status' => 'Dipinjam'
        ]);

        return redirect('peminjaman')->with('pesan_create', 'Peminjaman berhasil dilakukan!');
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
        Peminjaman::where('id_buku', $id)->update([
            'status' => 'Dikembalikan'
        ]);
        Book::where('id_buku', $id)->update([
            'status' => 'Tersedia'
        ]);
        return redirect('peminjaman')->with('pesan_edit', 'Buku telah dikembalikan!');
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
