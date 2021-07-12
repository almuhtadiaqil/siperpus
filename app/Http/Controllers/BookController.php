<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('pages.buku.index', compact('books'));
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

        Book::create([
            'judul_buku' => $request->judul_buku,
            'nomor_buku' => $request->nomor_buku,
            'id_kategori' => $request->kategori,
            'pengarang' => $request->pengarang,
            'id_penerbit' => $request->penerbit,
            'cover' => Book::uploadPhoto($request->file('cover')),
            'status' => 'Tersedia'
        ]);
        return redirect('book')->with('pesan_create', 'Buku berhasil ditambahkan ');
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

        if ($request->file('cover')) {
            Book::where('id_buku', $id)->update([
                'judul_buku' => $request->judul_buku,
                'nomor_buku' => $request->nomor_buku,
                'id_kategori' => $request->kategori,
                'pengarang' => $request->pengarang,
                'id_penerbit' => $request->penerbit,
                'cover' => Book::uploadPhoto($request->file('cover')),
            ]);
        } else {
            Book::where('id_buku', $id)->update([
                'judul_buku' => $request->judul_buku,
                'nomor_buku' => $request->nomor_buku,
                'id_kategori' => $request->kategori,
                'pengarang' => $request->pengarang,
                'id_penerbit' => $request->penerbit,
            ]);
        }

        return redirect('book')->with('pesan_edit', 'Buku berhasil dirubah ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::where('id_buku', $id);
        $book->delete();

        return redirect('book')->with('pesan_delete', 'Buku berhasil dihapus !');
    }
}
