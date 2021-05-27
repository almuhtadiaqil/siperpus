@extends('include.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('superadmin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_barang">Tambah Barang</button>
                <a href="#" class="btn btn-success btn-sm">Cetak Laporan</a>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>HS Code</th>
                            <th>Kategori</th>
                            <th>Kondisi</th>
                            <th>Jenis Satuan</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>1</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->hs_code}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->kondisi}}</td>
                                <td>{{$item->jenis_satuan}}</td>
                                <td>{{$item->stok}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm edit-user" data-toggle="modal"
                                        >Edit</button>
                                    <form action="" method="POST"
                                        style="display: inline;">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                        @empty)
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
  
@endsection
