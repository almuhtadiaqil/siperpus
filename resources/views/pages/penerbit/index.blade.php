@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_penerbit">Tambah
                    Penerbit</button>
                <h1 class="text-center">Tabel Penerbit</h1>
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
                            <th>Nama Penerbit</th>
                            <th>Kota Penerbit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penerbit as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_penerbit }}</td>
                                <td>{{ $item->kota_penerbit }}</td>
                                <td class="text-center">
                                    <button class="btn btn-info btn-sm edit-user fas fa-edit" data-toggle="modal"
                                        data-target="#edit-penerbit-{{ $item->id_penerbit }}"></button>
                                    <form action="{{ route('penerbit.destroy', $item->id_penerbit) }}" method="POST"
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
    <div id="tambah_penerbit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penerbit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penerbit.store') }}" method="POST" id="tambah_penerbit"
                        enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nama_penerbit" class="col-form-label">Penerbit</label>
                            <input name="nama_penerbit" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_penerbit" class="col-form-label">Kota Penerbit</label>
                            <input name="kota_penerbit" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- akhir modal tambah barang --}}

    {{-- awal modal edit barang --}}
    @foreach ($penerbit as $penerbits)
        <div id="edit-penerbit-{{ $penerbits->id_penerbit }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Penerbit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('penerbit.update', $penerbits->id_penerbit) }}" method="POST"
                            id="tambah_barang" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nama_penerbit" class="col-form-label">Kategori</label>
                                <input name="nama_penerbit" class="form-control" required
                                    value="{{ $penerbits->nama_penerbit }}">
                            </div>
                            <div class="form-group">
                                <label for="kota_penerbit" class="col-form-label">Kategori</label>
                                <input name="kota_penerbit" class="form-control" required
                                    value="{{ $penerbits->nama_penerbit }}">
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
