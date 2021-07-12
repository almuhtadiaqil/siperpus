@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_barang">Tambah Buku</button>
                <h1 class="text-center">Tabel Buku</h1>
                <br><br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Nomor Buku</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kota Penerbit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul_buku }}</td>
                                <td>{{ $item->nomor_buku }}</td>
                                <td>{{ $item->kategori->kategori }}</td>
                                <td>{{ $item->pengarang }}</td>
                                <td>{{ $item->penerbit->nama_penerbit }}</td>
                                <td>{{ $item->penerbit->kota_penerbit }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="text-center">
                                    <button class="btn btn-info btn-sm edit-user fas fa-edit" data-toggle="modal"
                                        data-target="#edit-barang-{{ $item->id_buku }}"></button>
                                    <form action="{{ route('book.destroy', $item->id_buku) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- awal modal tambah barang --}}
    <div id="tambah_barang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('book.store') }}" method="POST" id="tambah_barang"
                        enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="judul_buku" class="col-form-label">Judul buku</label>
                            <input type="text" class="form-control" name="judul_buku" style="text-transform: uppercase"
                                onkeyup="this.value = this.value.toUpperCase()" required>
                        </div>

                        <div class="form-group">
                            <label for="nomor_buku" class="col-form-label">Nomor Buku</label>
                            <input type="text" class="form-control" name="nomor_buku" required>
                        </div>

                        <div class="form-group">
                            <label for="kategori" class="col-form-label">Kategori</label>
                            <input name="kategori" class="form-control" required>

                        </div>

                        <div class="form-group">
                            <label for="pengarang" class="col-form-label">Pengarang</label>
                            <input name="pengarang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="penerbit" class="col-form-label">Penerbit</label>
                            <input name="penerbit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cover" class="col-form-label">Cover</label>
                            <input name="cover" class="form-control" type="file" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- akhir modal tambah barang --}}

    {{-- awal modal edit barang --}}
    @foreach ($books as $book)
        <div id="edit-barang-{{ $book->id_buku }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('book.update', $book->id_buku) }}" method="POST" id="tambah_barang"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="judul_buku" class="col-form-label">Judul buku</label>
                                <input type="text" class="form-control" name="judul_buku" style="text-transform: uppercase"
                                    onkeyup="this.value = this.value.toUpperCase()" required
                                    value="{{ $book->judul_buku }}">
                            </div>

                            <div class="form-group">
                                <label for="nomor_buku" class="col-form-label">Nomor Buku</label>
                                <input type="text" class="form-control" name="nomor_buku" required
                                    value="{{ $book->nomor_buku }}">
                            </div>

                            <div class="form-group">
                                <label for="kategori" class="col-form-label">Kategori</label>
                                <input name="kategori" class="form-control" required value="{{ $book->kategori }}">

                            </div>

                            <div class="form-group">
                                <label for="pengarang" class="col-form-label">Pengarang</label>
                                <input name="pengarang" class="form-control" required value="{{ $book->pengarang }}">
                            </div>
                            <div class="form-group">
                                <label for="penerbit" class="col-form-label">Penerbit</label>
                                <input name="penerbit" class="form-control" required value="{{ $book->penerbit }}">
                            </div>
                            <div class="form-group">
                                <label for="cover" class="col-form-label">Cover</label>
                                <input name="cover" class="form-control" type="file" value="{{ $book->cover }}">
                                <img class="mt-4" src="{{ Storage::url('books/' . $book->cover) }}"
                                    alt="{{ $book->judul_buku }}" width="70px" height="100px">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- akhir modal edit barang --}}


@endsection
