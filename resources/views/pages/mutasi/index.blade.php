@extends('layouts.superadmin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('superadmin.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_mutasi">Tambah Mutasi Barang</button>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr> 
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Saldo Awal</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Saldo Akhir</th>
                            <th>Selisih</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>4</td>
                                <td>Produk</td>
                                <td>Kg</td>
                                <td>200</td>
                                <td>0</td>
                                <td>0</td>
                                <td>200</td>
                                <td>none</td>
                                <td>
                                    <button class="btn btn-info btn-sm edit-user" data-toggle="modal" data-target="#edit-barang">Edit</button>
                                    <form action="" method="POST"
                                        style="display: inline;">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="9" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
@endsection
