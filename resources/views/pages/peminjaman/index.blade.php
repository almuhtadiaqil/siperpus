@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peminjaman">Tambah
                    Peminjaman</button>
                <h1 class="text-center">Tabel Peminjaman</h1>
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
                            <th>Peminjam</th>
                            <th>Umur</th>
                            <th>Pekerjaan</th>
                            <th>Judul Buku</th>
                            <th>Nomor Buku</th>
                            <th>Kategori</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Kota Penerbit</th>
                            <th>Waktu Peminjaman</th>
                            <th>Waktu Pengembalian</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_peminjam}}                 
                                <button class=" ml-1 btn btn-info btn-sm" data-toggle="modal" data-target="#user_detail-{{$item->id_peminjaman}}">
                                <i class=" fas fa-plus-circle">
                                </i>
                                </button>
                                </td>
                                <td>{{ $item->umur_peminjam }}</td>
                                <td>{{ $item->pekerjaan }}</td>
                                <td>{{ $item->book->judul_buku }}</td>
                                <td>{{ $item->book->nomor_buku }}</td>
                                <td>{{ $item->book->kategori->kategori }}</td>
                                <td>{{ $item->book->pengarang }}</td>
                                <td>{{ $item->book->penerbit->nama_penerbit }}</td>
                                <td>{{ $item->book->penerbit->kota_penerbit }}</td>
                                <td>{{ $item->waktu_peminjaman }}</td>
                                <td>{{ $item->waktu_pengembalian }}</td>
                                <td class="text-center btn @if ($item->status == 'Dikembalikan') btn-success @else btn-warning @endif m-auto">
                                    {{ $item->status }}</td>
                                <td class="text-center">
                                    @if ($item->book->status == 'Dipinjam')
                                        <form action="{{ route('peminjaman.update', $item->id_buku) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary btn-sm">Kembalikan</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14" class="text-center">
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
    <div id="tambah_peminjaman" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="{{ route('peminjaman.store') }}" method="POST" id="tambah_barang"
                        enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nama_peminjam" class="col-form-label">Peminjam</label>
                            <input type="text" class="form-control" name="nama_peminjam" required>
                        </div>
                        <div class="form-group">
                            <label for="umur_peminjam" class="col-form-label">Umur</label>
                            <input type="text" class="form-control" name="umur_peminjam" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-form-label">Nomor Hp</label>
                            <input type="text" class="form-control" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_instansi" class="col-form-label">Instansi</label>
                            <input type="text" class="form-control" name="nama_instansi" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_rumah" class="col-form-label">Alamat Rumah</label>
                            <input type="text" class="form-control" name="alamat_rumah" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_instansi" class="col-form-label">Alamat Instansi</label>
                            <input type="text" class="form-control" name="alamat_instansi" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_peminjaman" class="col-form-label">Waktu Peminjaman</label>
                            <input type="date" class="form-control" name="waktu_peminjaman" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_pengembalian" class="col-form-label">Waktu Pengembalian</label>
                            <input type="date" class="form-control" name="waktu_pengembalian" required>
                        </div>
                        <div class="form-group">
                            <label for="judul_buku" class="col-form-label">Judul buku</label>
                            <select name="id_buku" id="id_buku" class="ml-5 p-2">
                                @foreach ($books as $book)
                                    <option value="{{ $book->id_buku }}">{{ $book->judul_buku }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- akhir modal tambah barang --}}

    {{-- awal modal edit barang --}}
    @foreach ($peminjaman as $user)
        <div id="user_detail-{{ $user->id_peminjaman }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Peminjam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-sm table-bordered">
                    <tbody>
                            <tr>
                                <td class="text-center">Nama</td>
                                <td class="text-center">{{ $user->nama_peminjam }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Umur</td>
                                <td class="text-center">{{ $user->umur_peminjam }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Pekerjaan</td>
                                <td class="text-center">{{ $user->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Instansi</td>
                                <td class="text-center">{{ $user->nama_instansi }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Alamat Rumah</td>
                                <td class="text-center">{{ $user->alamat_rumah }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Alamat Instansi</td>
                                <td class="text-center">{{ $user->alamat_instansi }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Nomor Hp</td>
                                <td class="text-center">{{ $user->no_hp }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Email</td>
                                <td class="text-center">{{ $user->email }}</td>
                            </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- akhir modal edit barang --}}


@endsection
